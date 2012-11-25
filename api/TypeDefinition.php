<?php
class TypeDefinition extends ExtensionData {
	/**
	 * @var string
	 */
	public $id;
	
	/**
	 * @var string
	 */
	public $localName;

	/**
	 * URI
	 * @var unknown_type
	 */
	public $localNamespace;
	
	/**
	 * optional
	 * @var string
	 */
	public $displayName;
	
	/**
	 * optional
	 * @var string
	 */
	public $queryName;
	
	/**
	 * one of cmis:document, cmis:folder, cmis:relationship, cmis:policy
	 * @var string
	 */
	public $baseId;
	
	/**
	 * This is the id for the parent type definition. If
	 * this is a base type,
	 * this is not present.
	 * 
	 * @var string
	 */
	public $parentId;
	
	/**
	 * @var boolean
	 */
	public $creatable;
	
	/**
	 * @var boolean
	 */
	public $filable;
	
	/**
	 * @var boolean
	 */
	public $queryable;
	
	/**
	 * @var boolean
	 */
	public $fulltextIndexed;
	
	/**
	 * @var boolean
	 */
	public $includedInSupertypeQuery=true;
	
	/**
	 * @var boolean
	 */
	public $controllablePolicy;
	
	/**
	 * @var boolean
	 */
	public $controllableACL;
	
	/*
			<!-- property definitions -->
			<xs:choice minOccurs="0" maxOccurs="unbounded">
				<xs:annotation>
					<xs:appinfo>
						<jaxb:property name="propertyDefinition" />
					</xs:appinfo>
				</xs:annotation>
				<xs:element name="propertyBooleanDefinition" type="cmis:cmisPropertyBooleanDefinitionType" />
				<xs:element name="propertyDateTimeDefinition" type="cmis:cmisPropertyDateTimeDefinitionType" />
				<xs:element name="propertyDecimalDefinition" type="cmis:cmisPropertyDecimalDefinitionType" />
				<xs:element name="propertyIdDefinition" type="cmis:cmisPropertyIdDefinitionType" />
				<xs:element name="propertyIntegerDefinition" type="cmis:cmisPropertyIntegerDefinitionType" />
				<xs:element name="propertyHtmlDefinition" type="cmis:cmisPropertyHtmlDefinitionType" />
				<xs:element name="propertyStringDefinition" type="cmis:cmisPropertyStringDefinitionType" />
				<xs:element name="propertyUriDefinition" type="cmis:cmisPropertyUriDefinitionType" />
			</xs:choice>

	 */
	/**
	 * array of
	 * @var object PropertyBooleanDefinition
	 */
	public $propertyBooleanDefinition;
	
	/**
	 * array of
	 * @var object PropertyDateTimeDefinition
	 */
	public $propertyDateTimeDefinition;
	
	/**
	 * array of
	 * @var object ProperyDecimalDefinition
	 */
	public $propertyDecimalDefinition;
	
	/**
	 * array of
	 * @var object PropertyIdDefinition 
	 */
	public $propertyIdDefinition;
	
	/**
	 * array of
	 * @var object PropertyIntegerDefinition
	 */
	public $propertyIntegerDefinition;
	
	/**
	 * array of
	 * @var object PropertyHtmlDefinition
	 */
	public $propertyHtmlDefinition;
	
	/**
	 * array of 
	 * @var object PropertyStringDefinition
	 */
	public $propertyStringDefinition;
	
	/**
	 * array of
	 * @var object PropertyUriDefinition
	 */
	public $propertyUriDefinition;
}