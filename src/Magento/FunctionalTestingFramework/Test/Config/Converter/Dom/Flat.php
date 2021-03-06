<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */

namespace Magento\FunctionalTestingFramework\Test\Config\Converter\Dom;

use Magento\FunctionalTestingFramework\Config\ConverterInterface;
use Magento\FunctionalTestingFramework\Config\Dom\ArrayNodeConfig;

/**
 * Universal converter of any XML data to an array representation with no data loss
 */
class Flat implements ConverterInterface
{
    /**
     * Array node configuration.
     *
     * @var ArrayNodeConfig
     */
    protected $arrayNodeConfig;

    /**
     * Constructor
     *
     * @param ArrayNodeConfig $arrayNodeConfig
     */
    public function __construct(ArrayNodeConfig $arrayNodeConfig)
    {
        $this->arrayNodeConfig = $arrayNodeConfig;
    }

    /**
     * Convert config.
     *
     * @param \DOMDocument $source
     * @return array|string
     */
    public function convert($source)
    {
        return $this->convertXml($source);
    }

    /**
     * Convert dom node tree to array in general case or to string in a case of a text node
     *
     * Example:
     * <node attr="val">
     *     <subnode>val2<subnode>
     * </node>
     *
     * is converted to
     *
     * array(
     *     'node' => array(
     *         'attr' => 'wal',
     *         'subnode' => 'val2'
     *     )
     * )
     *
     * @param \DOMNode $source
     * @param string $basePath
     * @return string|array
     * @throws \UnexpectedValueException
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public function convertXml(\DOMNode $source, $basePath = '')
    {
        $value = [];
        /** @var \DOMNode $node */
        foreach ($source->childNodes as $node) {
            if ($node->nodeType == XML_ELEMENT_NODE && $node->getAttribute('remove') != 'true') {
                $nodeName = $node->nodeName;
                $nodePath = $basePath . '/' . $nodeName;

                $arrayKeyAttribute = $this->arrayNodeConfig->getAssocArrayKeyAttribute($nodePath);
                $isNumericArrayNode = $this->arrayNodeConfig->isNumericArray($nodePath);
                $isArrayNode = $isNumericArrayNode || $arrayKeyAttribute;

                if (isset($value[$nodeName]) && !$isArrayNode) {
                    throw new \UnexpectedValueException(
                        "Node path '{$nodePath}' is not unique, but it has not been marked as array."
                    );
                }

                $nodeData = $this->convertXml($node, $nodePath);
                if ($isArrayNode) {
                    if ($isNumericArrayNode) {
                        $value[$nodeName][] = $nodeData;
                    } elseif (isset($nodeData[$arrayKeyAttribute])) {
                        $arrayKeyValue = $nodeData[$arrayKeyAttribute];
                        $value[$arrayKeyValue] = $nodeData;
                    } else {
                        throw new \UnexpectedValueException(
                            "Array is expected to contain value for key '{$arrayKeyAttribute}'."
                        );
                    }
                } else {
                    $value[$nodeName] = $nodeData;
                }
            } elseif ($node->nodeType == XML_CDATA_SECTION_NODE
                || ($node->nodeType == XML_TEXT_NODE && trim($node->nodeValue) != '')
            ) {
                $value = $node->nodeValue;
                break;
            }
        }
        $result = $this->getNodeAttributes($source);
        if (is_array($value)) {
            $result = array_merge($result, $value);
            if (!$result) {
                $result = '';
            }
        } else {
            if ($result) {
                $result['value'] = $value;
            } else {
                $result = $value;
            }
        }
        return $result;
    }

    /**
     * Retrieve key-value pairs of node attributes
     *
     * @param \DOMNode $node
     * @return array
     */
    protected function getNodeAttributes(\DOMNode $node)
    {
        $result = ['nodeName' => $node->nodeName];
        $attributes = $node->attributes ?: [];
        /** @var \DOMNode $attribute */
        foreach ($attributes as $attribute) {
            if ($attribute->nodeType == XML_ATTRIBUTE_NODE) {
                $result[$attribute->nodeName] = $attribute->nodeValue;
            }
        }
        return $result;
    }
}
