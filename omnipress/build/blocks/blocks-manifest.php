<?php
// This file is generated. Do not modify it manually.
return array(
	'back-to-top' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/back-to-top',
		'version' => '1.0.0',
		'title' => 'Back to Top',
		'category' => 'omnipress',
		'description' => ' Add a back to top button to your page.',
		'opSettings' => array(
			'button' => array(
				'group' => 'design',
				'selector' => '#back-to-top',
				'label' => 'Back to Top Button',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'typography' => true,
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'scrollBar' => array(
				'group' => 'design',
				'selector' => '.circle-progress::after',
				'label' => 'Progress Bar',
				'fields' => array(
					'color' => array(
						'background' => true
					)
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'icon' => array(
				'type' => 'string',
				'default' => 'fas fa-angle-up',
				'source' => 'attribute',
				'selector' => 'i',
				'attribute' => 'class'
			),
			'styles' => array(
				'type' => 'object',
				'default' => array(
					'button' => array(
						'height' => '40px',
						'width' => '40px',
						'borderRadius' => '50%',
						'backgroundColor' => 'var(--op-clr-block-secondary)',
						'color' => 'var(--op-clr-white)'
					),
					'scrollBar' => array(
						'backgroundColor' => 'var(--op-clr-block-primary)'
					)
				)
			),
			'iconPosition' => array(
				'type' => 'string',
				'default' => 'right'
			),
			'content' => array(
				'type' => 'string',
				'default' => '',
				'source' => 'html',
				'selector' => '#back-to-top .content'
			),
			'progressBarType' => array(
				'type' => 'string',
				'default' => 'circle'
			)
		),
		'supports' => array(
			'anchor' => true,
			'interactivity' => true,
			'multiple' => false
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'back to top',
			'back to top button'
		),
		'viewScriptModule' => array(
			'file:back-to-top-view.js'
		)
	),
	'breadcrumb' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/breadcrumb',
		'version' => '1.0.0',
		'title' => 'Breadcrumb',
		'category' => 'omnipress',
		'description' => 'A breadcrumb block.',
		'opSettings' => array(
			'breadcrumbItem' => array(
				'group' => 'design',
				'selector' => '.breadcrumb-item',
				'label' => 'Breadcrumb Item',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'typography' => true,
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'activeBreadcrumb' => array(
				'group' => 'design',
				'selector' => '.breadcrumb-item.active',
				'label' => 'Active Breadcrumb',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'typography' => true,
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'layout' => array(
				'type' => 'string'
			),
			'enableSchema' => array(
				'type' => 'boolean'
			)
		),
		'supports' => array(
			'anchor' => true,
			'interactivity' => true
		),
		'textdomain' => 'omnipress'
	),
	'list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/list',
		'version' => '1.0.0',
		'title' => 'List',
		'category' => 'omnipress',
		'description' => 'Display a list of posts based on a taxonomy query.',
		'opSettings' => array(
			'gradientMarker' => array(
				'group' => 'design',
				'selector' => '.list-item-content::before',
				'label' => 'Marker Style',
				'fields' => array(
					
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'listType' => array(
				'type' => 'string',
				'default' => 'ul'
			),
			'listStyle' => array(
				'type' => 'string'
			),
			'listStylePosition' => array(
				'type' => 'string'
			),
			'selectedLayout' => array(
				'type' => 'string',
				'default' => 'layout-one'
			),
			'hideOnDesktop' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideOnTablet' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideOnMobile' => array(
				'type' => 'boolean',
				'default' => false
			),
			'isHorizontal' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'anchor' => true,
			'interactivity' => true
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'list',
			'list block'
		)
	),
	'list-item' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/list-item',
		'version' => '1.0.0',
		'title' => 'List Item',
		'category' => 'omnipress',
		'description' => 'Display a list of posts based on a taxonomy query.',
		'parent' => array(
			'omnipress/list'
		),
		'opSettings' => array(
			'gradientMarker' => array(
				'group' => 'design',
				'selector' => '.list-item-content::before',
				'label' => 'Marker Style',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true,
					'border' => true
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'selectedLayout' => array(
				'type' => 'string',
				'default' => 'layout-one'
			),
			'hideOnDesktop' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideOnTablet' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideOnMobile' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'supports' => array(
			'anchor' => true,
			'interactivity' => true
		),
		'textdomain' => 'omnipress'
	),
	'single-testimonial' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/single-testimonial',
		'version' => '1.0.0',
		'title' => 'Single Testimonial',
		'category' => 'omnipress',
		'description' => 'Display a list of posts based on a taxonomy query.',
		'parent' => array(
			'omnipress/query-template'
		),
		'usesContext' => array(
			'query',
			'postId',
			'postType',
			'isFirstChild'
		),
		'opSettings' => array(
			'testimonial' => array(
				'group' => 'design',
				'selector' => '.op-testimonial--content',
				'label' => 'Testimonial',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						
					),
					'typography' => true
				)
			),
			'wrapper' => array(
				'group' => 'design',
				'selector' => '.op-testimonial--card'
			),
			'featureImage' => array(
				'group' => 'design',
				'selector' => '.op-testimonial--thumbnail',
				'label' => 'Thumbnail',
				'fields' => array(
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'authorName' => array(
				'group' => 'design',
				'selector' => '.op-testimonial--author-name',
				'label' => 'Author Name',
				'fields' => array(
					'typography' => true
				)
			),
			'authorRole' => array(
				'group' => 'design',
				'selector' => '.op-testimonial--author-role',
				'label' => 'Author Role',
				'fields' => array(
					'typography' => true
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'testimonialId' => array(
				'type' => 'number'
			),
			'selectedLayout' => array(
				'type' => 'string',
				'default' => 'layout-one'
			),
			'hideOnDesktop' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideOnTablet' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideOnMobile' => array(
				'type' => 'boolean',
				'default' => false
			),
			'condition' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'interactions' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'hiddenFields' => array(
				'type' => 'array',
				'default' => array(
					
				)
			),
			'post' => array(
				'type' => 'object'
			),
			'configs' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'opAnimation' => array(
				'type' => 'string',
				'source' => 'attribute',
				'attribute' => 'data-op-animation',
				'selector' => '*'
			),
			'conditionalControls' => array(
				'type' => 'boolean',
				'default' => false
			),
			'controls' => array(
				'type' => 'object',
				'default' => array(
					'user_rules' => false,
					'location_rules' => false,
					'url_rules' => false,
					'device_rules' => false,
					'browser_rules' => false
				)
			),
			'conditionalDisplay' => array(
				'type' => 'object',
				'default' => array(
					'user_rules' => array(
						'enable' => true,
						'users' => array(
							
						),
						'user_roles' => array(
							
						),
						'strict_connector' => false
					),
					'location' => array(
						'ruleSets' => array(
							array(
								'enable' => true,
								'id' => 1,
								'rules' => array(
									
								)
							)
						)
					)
				)
			),
			'appliedStyle' => array(
				'type' => 'string'
			),
			'componentName' => array(
				'type' => 'string'
			),
			'componentId' => array(
				'type' => 'string'
			),
			'isSynced' => array(
				'type' => 'boolean'
			),
			'backgroundType' => array(
				'type' => 'string'
			),
			'tooltipPosition' => array(
				'type' => 'string'
			),
			'tooltipText' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'anchor' => true,
			'interactivity' => true
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'testimonial',
			'comment'
		)
	),
	'tooltip' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/tooltip',
		'version' => '1.0.0',
		'title' => 'Tooltip',
		'category' => 'omnipress',
		'description' => 'Add informative tooltips that appear when users hover over elements. Perfect for providing additional context, explanations, or helpful hints without cluttering your content.',
		'opSettings' => array(
			'wrapper' => array(
				'group' => 'design',
				'selector' => '.tooltip',
				'label' => 'Tooltip Text',
				'fields' => array(
					'typography' => true
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'anchor' => true,
			'interactivity' => true,
			'multiple' => false
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'taxonomy',
			'category',
			'tags'
		),
		'viewScriptModule' => array(
			'file:tooltip-view.js'
		)
	),
	'button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/button',
		'version' => '1.0.0',
		'title' => 'Button',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Add buttons to redirect user to different webpages',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSupports' => array(
			'link' => true
		),
		'opSettings' => array(
			'wrapper' => array(
				'group' => 'design',
				'selector' => '',
				'label' => 'Button',
				'fields' => array(
					'typography' => true,
					'dimension' => array(
						'gap' => true
					)
				)
			),
			'icons' => array(
				'group' => 'design',
				'selector' => 'i',
				'label' => 'Icon',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'dimension' => array(
						'fontSize' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string',
				'default' => ''
			),
			'css' => array(
				'type' => 'string'
			),
			'productId' => array(
				'type' => 'number'
			),
			'buttonContentType' => array(
				'type' => 'string',
				'default' => ''
			),
			'content' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.op-block__button-content > span',
				'default' => 'Learn More'
			),
			'rel' => array(
				'type' => 'string',
				'attribute' => 'rel',
				'source' => 'attribute',
				'selector' => 'a',
				'default' => 'noopener norefferer'
			),
			'dataTitle' => array(
				'type' => 'string',
				'attribute' => 'data-title',
				'source' => 'attribute',
				'selector' => '.op-block__button',
				'default' => 'button'
			),
			'dataType' => array(
				'type' => 'string',
				'attribute' => 'data-type',
				'source' => 'attribute',
				'selector' => '.op-block__button',
				'default' => 'button'
			),
			'dataId' => array(
				'type' => 'string',
				'attribute' => 'data-id',
				'source' => 'attribute',
				'selector' => '.op-block__button',
				'default' => 'button'
			),
			'type' => array(
				'type' => 'string',
				'attribute' => 'type',
				'source' => 'attribute',
				'selector' => '.op-block__button',
				'default' => 'noopener'
			),
			'newTab' => array(
				'type' => 'string',
				'attribute' => 'target',
				'selector' => 'a',
				'default' => '_blank'
			),
			'link' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'a',
				'attribute' => 'href'
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					'border' => 'unset',
					'cursor' => 'pointer'
				)
			),
			'buttonAlign' => array(
				'type' => 'string',
				'default' => 'left'
			),
			'button' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'iconPosition' => array(
				'type' => 'string'
			),
			'icon' => array(
				'type' => 'string',
				'source' => 'attribute',
				'attribute' => 'class',
				'selector' => 'i'
			),
			'icons' => array(
				'type' => 'object',
				'default' => array(
					
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'column' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/innercolumn',
		'version' => '1.0.0',
		'title' => 'Inner column',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Inner Column blocks allow easy content structuring, making visually appealing and responsive web page layouts',
		'supports' => array(
			'className' => true,
			'html' => false,
			'anchor' => true
		),
		'opSettings' => array(
			'background' => array(
				'group' => 'design',
				'label' => 'Background',
				'fields' => array(
					
				)
			),
			'wrapper' => array(
				'group' => 'design',
				'label' => 'Background',
				'fields' => array(
					
				)
			),
			'flex' => array(
				'group' => 'design',
				'label' => 'Background',
				'selector' => '.op-column__content-wrapper',
				'field' => array(
					
				)
			),
			'spacing' => array(
				'group' => 'design',
				'label' => 'Background',
				'fields' => array(
					
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'container' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/container',
		'version' => '1.0.0',
		'title' => 'Container',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Create beautiful row and column layouts with plenty of styling controls & responsive options',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'usesContext' => array(
			'classNames',
			'omnipress/parentId',
			'omnipress/editorClasses'
		),
		'opSettings' => array(
			'wrapper' => array(
				'group' => 'design',
				'label' => 'Content',
				'fields' => array(
					'color' => array(
						'background' => true,
						'backgroundImage' => true,
						'backgroundVideo' => true
					)
				)
			),
			'innerBlocks' => array(
				'group' => 'design',
				'label' => 'Children Typography',
				'selector' => ' > .op-container-innerblocks-wrapper *',
				'fields' => array(
					'typography' => true
				)
			),
			'flex' => array(
				'group' => 'design',
				'label' => 'Children Flex',
				'selector' => ' > .op-container-innerblocks-wrapper',
				'fields' => array(
					
				)
			),
			'link' => array(
				'group' => 'design',
				'label' => 'Link',
				'selector' => ' a',
				'fields' => array(
					
				)
			),
			'content' => array(
				'group' => 'design',
				'label' => 'Content',
				'selector' => ' > .op-container-innerblocks-wrapper',
				'fields' => array(
					
				)
			),
			'layout' => array(
				'group' => 'design',
				'label' => 'Content',
				'fields' => array(
					
				)
			),
			'colors' => array(
				'group' => 'design',
				'label' => 'Content',
				'fields' => array(
					
				)
			),
			'background' => array(
				'group' => 'design',
				'label' => 'Content',
				'fields' => array(
					
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string',
				'default' => ''
			),
			'extraClasses' => array(
				'type' => 'string'
			),
			'css' => array(
				'type' => 'string',
				'default' => ''
			),
			'tagName' => array(
				'type' => 'string',
				'default' => 'div'
			),
			'clientId' => array(
				'type' => 'string'
			),
			'columnWidth' => array(
				'type' => 'string',
				'default' => 'alignwide'
			),
			'contentWidth' => array(
				'type' => 'string',
				'default' => 'alignwide'
			),
			'variationType' => array(
				'type' => 'string'
			),
			'columnsCount' => array(
				'type' => 'number',
				'default' => 1
			),
			'backgroundType' => array(
				'type' => 'string',
				'default' => 'color'
			),
			'background' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'videoBackground' => array(
				'type' => 'string',
				'default' => ''
			),
			'videoOpacity' => array(
				'type' => 'number',
				'default' => 1
			),
			'blockLink' => array(
				'type' => 'string',
				'default' => ''
			),
			'link_rel' => array(
				'type' => 'string',
				'default' => ''
			),
			'link_target' => array(
				'type' => 'boolean',
				'default' => false
			),
			'colors' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'preview' => array(
				'type' => 'boolean',
				'default' => true
			),
			'hideOnDesktop' => array(
				'type' => 'boolean'
			),
			'hideOnTablet' => array(
				'type' => 'boolean'
			),
			'hideOnMobile' => array(
				'type' => 'boolean'
			),
			'styles' => array(
				'type' => 'object',
				'default' => array(
					
				)
			)
		),
		'textdomain' => 'omnipress',
		'style' => array(
			'omnipress/block/container'
		)
	),
	'google-maps' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/maps',
		'version' => '1.0.0',
		'title' => 'Google Maps',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Add a Google Map location on your website',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSettings' => array(
			
		),
		'keywords' => array(
			'maps',
			'google map'
		),
		'textdomain' => 'omnipress'
	),
	'heading' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/heading',
		'version' => '1.0.0',
		'title' => 'Heading',
		'category' => 'omnipress',
		'description' => 'Create advanced heading with title, subtitle and separator controls.',
		'icon' => '',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'attributes' => array(
			'condition' => array(
				'type' => 'object',
				'default' => array(
					'enable' => true,
					'options' => array(
						array(
							'type' => 'user_rules',
							'status' => 'logged_in',
							'user_roles' => array(
								'administrator'
							),
							'user_ids' => array(
								
							)
						)
					)
				)
			),
			'headingStyles' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'css' => array(
				'type' => 'string'
			),
			'blockLink' => array(
				'type' => 'string',
				'default' => ''
			),
			'dataAttributes' => array(
				'type' => 'string',
				'default' => ''
			),
			'variation' => array(
				'type' => 'string'
			),
			'isLink' => array(
				'type' => 'boolean',
				'default' => false
			),
			'mdIsLink' => array(
				'type' => 'boolean',
				'default' => false
			),
			'smIsLink' => array(
				'type' => 'boolean',
				'default' => false
			),
			'href' => array(
				'type' => 'string'
			),
			'newTab' => array(
				'type' => 'boolean',
				'default' => false
			),
			'text' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.op-block__heading-content',
				'default' => 'Beautiful Heading'
			),
			'content' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.op-block__heading-content, [data-type=\'omnipress/heading\'] > h1, [data-type=\'omnipress/heading\'] > h2,[data-type=\'omnipress/heading\'] > h3,[data-type=\'omnipress/heading\'] > h4,[data-type=\'omnipress/heading\'] > h5,[data-type=\'omnipress/heading\'] > h6,[data-type=\'omnipress/heading\'] > a,[data-type=\'omnipress/heading\'] > p',
				'default' => 'Your Beautiful Heading'
			),
			'blockId' => array(
				'type' => 'string'
			),
			'seperatorIsActive' => array(
				'type' => 'boolean',
				'default' => false
			),
			'seperator' => array(
				'type' => 'object',
				'default' => array(
					'width' => '15%',
					'height' => '6px',
					'backgroundColor' => 'var(--op-clr-block-primary, #000)'
				)
			),
			'subHeading' => array(
				'type' => 'string',
				'default' => ''
			),
			'subheadingTagName' => array(
				'type' => 'string',
				'default' => 'p'
			),
			'isOpenSubHeading' => array(
				'type' => 'boolean',
				'default' => false
			),
			'headingType' => array(
				'type' => 'string',
				'default' => 'h2'
			),
			'linkStyles' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'subHeadingStyling' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'headingWrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			)
		),
		'opSettings' => array(
			'headingStyles' => array(
				'group' => 'design',
				'selector' => '.op-block__heading-content',
				'label' => 'Heading',
				'fields' => array(
					'typography' => true,
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'subHeadingStyling' => array(
				'group' => 'design',
				'toggleAttribute' => 'isOpenSubHeading',
				'selector' => '.op-block__heading-sub',
				'label' => 'Sub Heading',
				'fields' => array(
					'typography' => true,
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'transform' => true
				)
			),
			'seperator' => array(
				'group' => 'design',
				'selector' => '.op-block__heading-separator',
				'label' => 'Separator',
				'toggleAttribute' => 'seperatorIsActive',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'transform' => true
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'image' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/image',
		'version' => '1.0.0',
		'title' => 'Image',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'An image with advanced controls to make a visual statement.',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSettings' => array(
			'image' => array(
				'group' => 'design',
				'selector' => '.op-block__image-img',
				'label' => 'Image ',
				'fields' => array(
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'dimension' => array(
						'width' => true,
						'height' => true
					)
				)
			),
			'imageDimension' => array(
				'group' => 'design',
				'selector' => '.op-block__image-item',
				'label' => 'Image ',
				'fields' => array(
					
				)
			),
			'ImageCaption' => array(
				'group' => 'design',
				'selector' => '.op-block__image-caption',
				'label' => 'Image Caption',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'typography' => true
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'height' => array(
				'type' => 'number'
			),
			'width' => array(
				'type' => 'number'
			),
			'content' => array(
				'type' => 'string'
			),
			'id' => array(
				'type' => 'number'
			),
			'src' => array(
				'type' => 'string'
			),
			'isCaption' => array(
				'type' => 'boolean',
				'default' => false
			),
			'maskType' => array(
				'type' => 'string',
				'default' => 'circle',
				'selector' => '.op-block',
				'attribute' => 'data-masks',
				'source' => 'attribute'
			),
			'maskSize' => array(
				'type' => 'string',
				'default' => 'auto',
				'selector' => 'img',
				'attribute' => 'data-mask-size',
				'source' => 'attribute'
			),
			'maskPosition' => array(
				'type' => 'string',
				'default' => 'center center',
				'selector' => 'img',
				'attribute' => 'data-mask-position',
				'source' => 'attribute'
			),
			'maskRepeat' => array(
				'type' => 'string',
				'default' => 'no-repeat',
				'selector' => 'img',
				'attribute' => 'data-mask-repeat',
				'source' => 'attribute'
			),
			'alt' => array(
				'type' => 'string',
				'default' => '',
				'selector' => 'img',
				'attribute' => 'alt',
				'source' => 'attribute'
			),
			'caption' => array(
				'type' => 'string',
				'source' => 'text',
				'selector' => 'figcaption'
			),
			'title' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'img',
				'attribute' => 'title'
			),
			'target' => array(
				'type' => 'string',
				'default' => '',
				'selector' => 'img',
				'attribute' => 'target'
			),
			'size' => array(
				'type' => 'string',
				'default' => 'large',
				'selector' => 'img',
				'attribute' => 'data-size',
				'source' => 'attribute'
			),
			'isLoadLazily' => array(
				'type' => 'string',
				'default' => 'true',
				'selector' => 'img',
				'attribute' => 'data-lazy-load',
				'source' => 'attribute'
			),
			'enabledLightbox' => array(
				'type' => 'boolean',
				'default' => false
			),
			'href' => array(
				'type' => 'string'
			),
			'linkTarget' => array(
				'type' => 'string'
			),
			'linkRel' => array(
				'type' => 'string'
			),
			'linkClass' => array(
				'type' => 'string'
			),
			'hoverEffect' => array(
				'type' => 'string',
				'enum' => array(
					'zoom-in',
					'zoom-in-2',
					'zoom-out',
					'zoom-out-2',
					'slide',
					'rotate',
					'blur',
					'gray-scale',
					'gray-sepia',
					'blur-gray-scale',
					'opacity',
					'opacity-2',
					'flashing',
					'shine',
					'circle'
				),
				'default' => 'zoom-in'
			)
		),
		'textdomain' => 'omnipress'
	),
	'paragraph' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/paragraph',
		'version' => '1.0.0',
		'title' => 'Paragraph',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Take control of your text appearance and paragraph formatting with multiple setting options.',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSettings' => array(
			'wrapper' => array(
				'group' => 'design',
				'label' => 'Content',
				'fields' => array(
					'typography' => true
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'video' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/video',
		'version' => '1.0.0',
		'title' => 'Video',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Embed a video from your media library or upload a new one.',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'content' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => 'figure',
				'default' => ''
			),
			'videoWrapper' => array(
				'type' => 'object',
				'default' => array(
					'width' => 'max(100%, 300px)'
				)
			),
			'iframe' => array(
				'type' => 'boolean',
				'default' => false
			),
			'height' => array(
				'type' => 'number',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'height'
			),
			'caption' => array(
				'type' => 'rich-text',
				'source' => 'rich-text',
				'selector' => 'figcaption',
				'__experimentalRole' => 'content'
			),
			'id' => array(
				'type' => 'number',
				'__experimentalRole' => 'content'
			),
			'loop' => array(
				'type' => 'boolean',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'loop'
			),
			'muted' => array(
				'type' => 'boolean',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'muted',
				'default' => false
			),
			'controls' => array(
				'type' => 'boolean',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'controls',
				'default' => true
			),
			'autoplay' => array(
				'type' => 'boolean',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'autoplay',
				'default' => false
			),
			'playsInline' => array(
				'type' => 'boolean',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'playsinline',
				'default' => true
			),
			'preload' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'preload',
				'default' => 'auto'
			),
			'poster' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'video',
				'attribute' => 'poster'
			),
			'src' => array(
				'type' => 'string'
			),
			'width' => array(
				'type' => 'number',
				'source' => 'attribute',
				'selector' => 'video'
			),
			'tracks' => array(
				'__experimentalRole' => 'content',
				'type' => 'array',
				'items' => array(
					'type' => 'object'
				),
				'default' => array(
					
				)
			)
		),
		'opSettings' => array(
			'videoWrapper' => array(
				'group' => 'design',
				'selector' => '.op-block__video-wrapper',
				'label' => 'Video Wrapper',
				'fields' => array(
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'accordion' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'omnipress/accordion',
		'version' => '1.0.0',
		'title' => 'Accordion',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Display your schema ready FAQs with Accordion block',
		'example' => array(
			
		),
		'supports' => array(
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'lists' => array(
				'type' => 'array',
				'default' => array(
					array(
						'header' => 'FAQ item 1?',
						'key' => 'Key-1',
						'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.'
					)
				)
			),
			'disableInitialOpen' => array(
				'type' => 'boolean',
				'default' => true
			),
			'iconClass' => array(
				'type' => 'string',
				'selector' => 'button i',
				'default' => 'fas fa-angle-down',
				'source' => 'attribute',
				'attribute' => 'class'
			)
		),
		'opSettings' => array(
			'accordion' => array(
				'group' => 'design',
				'selector' => '.accordion',
				'label' => 'Accordion',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'title' => array(
				'group' => 'design',
				'selector' => '.accordion-header',
				'label' => 'Title',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'titleActive' => array(
				'group' => 'design',
				'selector' => '.accordion-header.active',
				'label' => 'Title Active',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'description' => array(
				'group' => 'design',
				'selector' => '.accordion-body',
				'label' => 'Description',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true
					),
					'typography' => true,
					'dimension' => array(
						'marginBottom' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'textdomain' => 'omnipress',
		'viewScriptModule' => array(
			'file:accordion-view.js'
		)
	),
	'countdown' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/countdown',
		'version' => '1.0.0',
		'title' => 'Countdown',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Highlight upcoming events with countdown timer',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSettings' => array(
			'card' => array(
				'group' => 'design',
				'selector' => '.countdown-card',
				'label' => 'Card',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'number' => array(
				'group' => 'design',
				'selector' => '.number',
				'label' => 'Digit',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'typography' => true,
					'dimension' => array(
						'height' => false,
						'width' => false,
						'min-height' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'label' => array(
				'group' => 'design',
				'selector' => '.label',
				'label' => 'Label',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true,
					'dimension' => array(
						'height' => false,
						'width' => false,
						'min-height' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'separator' => array(
				'group' => 'design',
				'selector' => '.separator',
				'label' => 'Separator',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'attributes' => array(
			'isRecurring' => array(
				'type' => 'boolean',
				'default' => false
			),
			'startDate' => array(
				'type' => 'string',
				'default' => ''
			),
			'recurringInterval' => array(
				'type' => 'number'
			),
			'separatorType' => array(
				'type' => 'string',
				'default' => 'colon'
			),
			'isShowingModal' => array(
				'type' => 'boolean',
				'default' => false
			),
			'blockId' => array(
				'type' => 'string',
				'default' => ''
			),
			'timezone' => array(
				'type' => 'string'
			),
			'styles' => array(
				'type' => 'object',
				'default' => array(
					'wrapper' => array(
						'padding' => array(
							'top' => '12px',
							'right' => '12px',
							'bottom' => '12px',
							'left' => '12px'
						)
					),
					'card' => array(
						'padding' => array(
							'top' => '8px',
							'right' => '8px',
							'bottom' => '8px',
							'left' => '8px'
						)
					),
					'separator' => array(
						'margin' => array(
							'top' => '0',
							'right' => '8px',
							'bottom' => '0',
							'left' => '8px'
						)
					),
					'number' => array(
						'fontSize' => '24px'
					)
				)
			),
			'hiddenFields' => array(
				'type' => 'array',
				'default' => array(
					'labelTop',
					'labelBottom'
				)
			),
			'expiredDate' => array(
				'type' => 'string'
			),
			'layoutType' => array(
				'type' => 'string',
				'default' => 'two'
			),
			'daysLabel' => array(
				'type' => 'string',
				'default' => 'DAYS'
			),
			'hoursLabel' => array(
				'type' => 'string',
				'default' => 'HOURS'
			),
			'minutesLabel' => array(
				'type' => 'string',
				'default' => 'MINUTES'
			),
			'secondsLabel' => array(
				'type' => 'string',
				'default' => 'SECONDS'
			)
		),
		'keywords' => array(
			'countdown',
			'timer',
			'timer'
		),
		'textdomain' => 'omnipress',
		'viewScriptModule' => array(
			'file:countdown-view.js'
		)
	),
	'counter' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/counter',
		'version' => '1.0.0',
		'title' => 'Counter',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Show company stats or how many happy customers you have with animation effects',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSettings' => array(
			'label' => array(
				'group' => 'design',
				'toggleAttribute' => 'showLabel',
				'selector' => '.op-block__counter-label',
				'label' => 'Label',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'icon' => array(
				'group' => 'design',
				'toggleAttribute' => 'showIcon',
				'selector' => '.op-block__counter-icon-wrapper i',
				'label' => 'Icon',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'number' => array(
				'group' => 'design',
				'selector' => '.op-block__counter-number-wrapper .op-block__counter-number',
				'label' => 'Number',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true,
						'gap' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'prefix' => array(
				'group' => 'design',
				'toggleAttribute' => 'showPrefix',
				'selector' => '.op-block__counter-number-prefix',
				'label' => 'Prefix',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'suffix' => array(
				'group' => 'design',
				'toggleAttribute' => 'showSuffix',
				'selector' => '.op-block__counter-number-suffix',
				'label' => 'Suffix',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'showIcon' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showLabel' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showPrefix' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showSuffix' => array(
				'type' => 'boolean',
				'default' => true
			),
			'content' => array(
				'type' => 'string'
			),
			'iconClass' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => '.op-block__counter-icon-wrapper > i',
				'attribute' => 'class',
				'default' => 'fas fa-smile'
			),
			'duration' => array(
				'type' => 'string',
				'source' => 'attribute',
				'default' => '1000',
				'selector' => '.op-block__counter',
				'attribute' => 'data-duration'
			),
			'CounterPrefix' => array(
				'type' => 'string',
				'source' => 'text',
				'selector' => '.op-block__counter-number-prefix',
				'default' => ''
			),
			'counterSuffix' => array(
				'type' => 'string',
				'source' => 'text',
				'selector' => '.op-block__counter-number-suffix',
				'default' => ''
			),
			'counterLabel' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.op-block__counter-label',
				'default' => 'Happy Customer'
			),
			'counterNumber' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => '.op-block__counter',
				'attribute' => 'data-counter-number',
				'default' => '100'
			),
			'icon' => array(
				'type' => 'object',
				'default' => array(
					'fontSize' => 'clamp(20px,2.4vw,24px)'
				)
			),
			'number' => array(
				'type' => 'object',
				'default' => array(
					'fontWeight' => 700,
					'fontSize' => '42px',
					'lineHeight' => '1.3em'
				)
			)
		),
		'textdomain' => 'omnipress',
		'viewScriptModule' => array(
			'file:counter-view.js'
		)
	),
	'icon-box' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/icon-box',
		'version' => '1.0.0',
		'title' => 'Icon Box',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Add icon and text description using a single block',
		'supports' => array(
			'html' => false,
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'iconPosition' => array(
				'type' => 'string'
			),
			'title' => array(
				'type' => 'string',
				'source' => 'html',
				'default' => 'Unlock Your Full Potential Today!',
				'selector' => '.op-block__icon-box-content-title'
			),
			'desc' => array(
				'type' => 'string',
				'source' => 'html',
				'selector' => '.op-block__icon-box-content-description',
				'default' => 'Join thousands of satisfied users who are transforming their lives with our powerful tools.'
			),
			'icon' => array(
				'type' => 'string',
				'attribute' => 'class',
				'selector' => 'i',
				'default' => 'fas fa-bell'
			),
			'href' => array(
				'type' => 'string',
				'selector' => '.op-block__icon-box-content-title',
				'source' => 'attribute',
				'attribute' => 'href'
			),
			'iconLink' => array(
				'type' => 'string',
				'selector' => '.op-block__icon-box-icon > a',
				'default' => '#',
				'source' => 'attribute',
				'attribute' => 'href'
			),
			'showIcon' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showTitle' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showDesc' => array(
				'type' => 'boolean',
				'default' => true
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'descStyle' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'titleStyle' => array(
				'type' => 'object',
				'default' => array(
					'margin' => '23px 0px 8px 0px',
					'fontSize' => '25px'
				)
			),
			'iconStyle' => array(
				'type' => 'object',
				'default' => array(
					'justifyContent' => 'center',
					'fontSize' => '32px'
				)
			),
			'hideIcon' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideTitle' => array(
				'type' => 'boolean',
				'default' => false
			),
			'hideDesc' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'opSettings' => array(
			'iconStyle' => array(
				'group' => 'design',
				'selector' => '.op-block__icon-box-icon',
				'label' => 'Icon',
				'toggleAttribute' => 'showIcon',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => array(
						'colorOnly' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'titleStyle' => array(
				'group' => 'design',
				'selector' => '.op-block__icon-box-content-title',
				'toggleAttribute' => 'showTitle',
				'label' => 'Heading',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'descStyle' => array(
				'group' => 'design',
				'selector' => '.op-block__icon-box-content-description',
				'toggleAttribute' => 'showDesc',
				'label' => 'Description',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'opSupports' => array(
			'link' => true
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'icon box',
			'icon',
			'card'
		)
	),
	'mega-menu' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/megamenu',
		'version' => '1.0.0',
		'title' => 'Mega Menu',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Add vertical and horizontal menu layouts with multiple setting options',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSettings' => array(
			'menuButton' => array(
				'group' => 'design',
				'selector' => '.op-block__megamenu .op-block__megamenu--hamburger',
				'label' => 'Menu Button',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'dimension' => array(
						'gap' => true,
						'width' => true,
						'height' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'menuWrapper' => array(
				'group' => 'design',
				'selector' => 'ul.op-block__megamenu-lists',
				'label' => 'Menu Wrapper',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'dimension' => array(
						'gap' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'subMenuWrapper' => array(
				'group' => 'design',
				'selector' => '.op-block__megamenu .op-block__megamenu-lists li:hover > ul',
				'label' => 'Submenu Wrapper',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'dimension' => array(
						'gap' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'dropdown' => array(
				'selector' => '.op-block__megamenu .op-block__megamenu-lists li:hover > ul'
			),
			'menuList' => array(
				'group' => 'design',
				'selector' => '.op-block__megamenu-dropdown-list-item--link',
				'label' => 'Menu Lists',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'dimension' => array(
						'gap' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'menuListImage' => array(
				'group' => 'design',
				'selector' => '.op-block__megamenu-dropdown-list-item--image',
				'label' => 'Menu Item Image',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'textdomain' => 'omnipress',
		'viewScriptModule' => array(
			'file:mega-menu-view.js'
		)
	),
	'popup' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/popup',
		'version' => '1.0.0',
		'title' => 'Popup',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'You can create beautiful popup.',
		'supports' => array(
			'className' => true,
			'anchor' => true,
			'interactivity' => true,
			'multiple' => false
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'content' => array(
				'type' => 'string'
			),
			'delayBeforePopup' => array(
				'type' => 'number',
				'default' => 1
			),
			'displayAfterVisits' => array(
				'type' => 'number',
				'default' => 0
			),
			'showEveryTime' => array(
				'type' => 'boolean',
				'default' => false
			),
			'preview' => array(
				'type' => 'boolean',
				'default' => true
			),
			'isDismissible' => array(
				'type' => 'boolean',
				'default' => true
			),
			'closeButtonDelay' => array(
				'type' => 'number',
				'default' => 0
			),
			'autoCloseEnabled' => array(
				'type' => 'boolean',
				'default' => false
			),
			'autoCloseDelay' => array(
				'type' => 'number',
				'default' => 30
			),
			'instanceId' => array(
				'type' => 'number'
			),
			'popupType' => array(
				'type' => 'string',
				'default' => 'floating_bar'
			),
			'popupTrigger' => array(
				'type' => 'string',
				'default' => 'on_page_load'
			),
			'popupPosition' => array(
				'type' => 'string'
			),
			'modalPosition' => array(
				'type' => 'string'
			),
			'slidePosition' => array(
				'type' => 'string'
			),
			'maxPopupRepetitions' => array(
				'type' => 'number',
				'default' => 1
			)
		),
		'opSettings' => array(
			'card' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card-wrap .op-block__post-grid-card.op-block__post-grid-card-items',
				'label' => 'card',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'post-category' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/post-category',
		'version' => '1.0.0',
		'title' => 'Post Category',
		'category' => 'omnipress',
		'description' => 'Show company stats or how many happy customers you have with animation effects',
		'supports' => array(
			'className' => true,
			'anchor' => true
		),
		'opSettings' => array(
			'title' => array(
				'group' => 'design',
				'selector' => '.category-title',
				'label' => 'Title',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'featureImage' => array(
				'group' => 'design',
				'selector' => '.category-image',
				'label' => 'Feature Image',
				'fields' => array(
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'description' => array(
				'group' => 'design',
				'selector' => '.category-description',
				'label' => 'Description',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true,
						'gap' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'count' => array(
				'group' => 'design',
				'selector' => '.category-count',
				'label' => 'Count',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'content' => array(
				'group' => 'design',
				'selector' => '.category-content',
				'label' => 'Content',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'prefix' => array(
				'type' => 'string'
			)
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'post',
			'category',
			'categories'
		)
	),
	'post-grid' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/post-grid',
		'version' => '1.0.0',
		'title' => 'Post Grid',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Display interactive blog in a grid layout',
		'supports' => array(
			'anchor' => true
		),
		'opSettings' => array(
			'card' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card',
				'label' => 'card',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'grid' => array(
				'group' => 'design',
				'selector' => '.omnipress-layout-grid',
				'label' => '',
				'fields' => array(
					
				)
			),
			'thumbnail' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card figure',
				'label' => 'Image',
				'fields' => array(
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'content' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card-content',
				'label' => 'Content',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					)
				)
			),
			'title' => array(
				'group' => 'design',
				'selector' => ' .op-block__post-grid-card-title',
				'label' => 'Title',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'excerpt' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card .op-block__post-grid-card-description',
				'label' => 'Excerpt',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'categories' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card .op-block__post-grid-card-categories a',
				'label' => 'Categories',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'spacing' => array(
						'padding' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'categoriesWrapper' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card-categories',
				'label' => 'Categories Wrapper',
				'fields' => array(
					'dimension' => array(
						'gap' => true
					)
				)
			),
			'date' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card .op-block__post-grid-card-date',
				'label' => 'Date',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'spacing' => array(
						'margin' => true
					),
					'typography' => true
				)
			),
			'author' => array(
				'group' => 'design',
				'selector' => '.op-block__post-grid-card .op-block__post-grid-card-author a',
				'label' => 'Author',
				'fields' => array(
					'spacing' => array(
						'margin' => true
					),
					'typography' => true
				)
			)
		),
		'attributes' => array(
			'linkedAttributes' => array(
				'type' => 'array',
				'default' => array(
					'title',
					'categories',
					'author'
				)
			),
			'blockId' => array(
				'type' => 'string',
				'default' => ''
			),
			'columns' => array(
				'type' => 'number',
				'default' => 3
			),
			'categories' => array(
				'type' => 'object',
				'default' => array(
					'borderRadius' => '7px',
					'backgroundColor' => 'var(--op-clr-block-primary)',
					'color' => '#ffffff',
					'padding' => '0 12px'
				)
			),
			'selectedCategoryId' => array(
				'type' => 'string',
				'default' => ''
			),
			'authorId' => array(
				'type' => 'number',
				'default' => 0
			),
			'postPerPage' => array(
				'type' => 'number'
			),
			'isHandPicked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'orderby' => array(
				'type' => 'string',
				'default' => 'date'
			),
			'order' => array(
				'type' => 'string',
				'default' => 'desc'
			),
			'search' => array(
				'type' => 'string'
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'disableAuthor' => array(
				'type' => 'boolean',
				'default' => false
			),
			'card' => array(
				'type' => 'object',
				'default' => array(
					'backgroundColor' => '#dbdbdb',
					'borderRadius' => '8px 8px 8px 8px'
				)
			),
			'content' => array(
				'type' => 'object',
				'default' => array(
					'padding' => '12px'
				)
			),
			'thumbnail' => array(
				'type' => 'object',
				'default' => array(
					'borderRadius' => '8px 8px 0 0',
					'aspectRatio' => '4/3'
				)
			)
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'woocommerce',
			'woo',
			'category',
			'products'
		),
		'style' => array(
			'omnipress/block/layout'
		)
	),
	'slide' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/slide',
		'version' => '1.0.0',
		'title' => 'Slide',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Create a slide inside slider',
		'supports' => array(
			'html' => false,
			'className' => true,
			'dimensions' => array(
				'minHeight' => false,
				'html' => false
			)
		),
		'textdomain' => 'omnipress',
		'editorScript' => 'file:./index.js',
		'editorStyle' => array(
			'file:index.css'
		)
	),
	'slider' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/slider',
		'version' => '1.0.0',
		'title' => 'Slider',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Create a captivating visual experience & impress your audience',
		'supports' => array(
			'html' => false,
			'className' => true,
			'dimensions' => array(
				'minHeight' => false,
				'html' => false
			),
			'interactivity' => true
		),
		'providesContext' => array(
			'omnipress/parentId' => 'blockId',
			'classNames' => 'classNames'
		),
		'opSettings' => array(
			'navigation' => array(
				'group' => 'design',
				'selector' => '[class^=\'swiper-button\']',
				'label' => 'Navigation',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'fontSize' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'pagination' => array(
				'group' => 'design',
				'selector' => '.swiper-pagination-bullet',
				'label' => 'Pagination',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'dimension' => array(
						'width' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'paginationActive' => array(
				'group' => 'design',
				'selector' => '.swiper-pagination-bullet-active',
				'label' => 'Pagination Active',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'scrollbar' => array(
				'group' => 'design',
				'selector' => '.swiper-scrollbar',
				'label' => 'Scrollbar',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'fontSize' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'scrollbarActive' => array(
				'group' => 'design',
				'selector' => 'swiper-scrollbar-drag',
				'label' => 'Scrollbar Active',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'attributes' => array(
			'configs' => array(
				'type' => 'object',
				'default' => array(
					'slidesPerView' => 1,
					'spaceBetween' => 20
				)
			),
			'slideToggleOptions' => array(
				'type' => 'object',
				'default' => array(
					'fade' => false,
					'loop' => true,
					'autoplay' => true
				)
			),
			'sliderType' => array(
				'type' => 'string'
			),
			'classNames' => array(
				'type' => 'string',
				'default' => 'swiper-slide'
			),
			'showNavigation' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showPagination' => array(
				'type' => 'string',
				'default' => 'true'
			),
			'showProgress' => array(
				'type' => 'boolean'
			),
			'showScrollbar' => array(
				'type' => 'boolean'
			),
			'autoplayStopOnLast' => array(
				'type' => 'string',
				'default' => 'true'
			),
			'blockId' => array(
				'type' => 'string',
				'default' => ''
			),
			'arrowIconNext' => array(
				'type' => 'string',
				'default' => 'fas fa-angle-right'
			),
			'arrowIconPrev' => array(
				'type' => 'string',
				'default' => 'fas fa-angle-left'
			),
			'navigation' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'pagination' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'scrollbar' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'paginationActive' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'scrollbarActive' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'sliderWrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			)
		),
		'textdomain' => 'omnipress',
		'style' => array(
			'omnipress-slider-style'
		),
		'viewScriptModule' => array(
			'file:./slider-view.js'
		)
	),
	'tab-labels' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'omnipress/tab-labels',
		'version' => '1.0.0',
		'title' => 'Tab Labels',
		'parent' => array(
			'omnipress/tabs'
		),
		'icon' => '',
		'category' => 'omnipress',
		'description' => 'Organize and display content in multiple tabs.',
		'supports' => array(
			'align' => false,
			'html' => false,
			'reusable' => false,
			'className' => true,
			'lock' => true,
			'anchor' => true
		),
		'opSettings' => array(
			'button' => array(
				'group' => 'design',
				'selector' => '.op-block__tab-labels--button',
				'label' => 'Button',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'fontSize' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'activeButton' => array(
				'group' => 'design',
				'selector' => '.op-block__tab-labels--button[aria-hidden=\'false\']',
				'label' => 'Button Active',
				'fields' => array(
					'color' => array(
						'text' => true,
						'background' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'icon' => array(
				'group' => 'design',
				'selector' => '.op-block__tab-labels--button i',
				'label' => 'Icon',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'fontSize' => true
					),
					'typography' => true,
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'tabs' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'omnipress/tabs',
		'version' => '1.0.2',
		'title' => 'Tabs',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Organize and display content in multiple tabs.',
		'supports' => array(
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'tabsCount' => array(
				'type' => 'number',
				'default' => 2
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'activeTab' => array(
				'type' => 'number',
				'default' => 1
			)
		),
		'opSettings' => array(
			
		),
		'textdomain' => 'omnipress',
		'viewScriptModule' => array(
			'file:tabs-view.js'
		)
	),
	'tabs-content' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'omnipress/tabs-content',
		'version' => '1.0.0',
		'title' => 'Tabs Content',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Organize diverse content effortlessly within each tab using the Tabs Content block',
		'supports' => array(
			'align' => false,
			'html' => false,
			'multiple' => true,
			'reusable' => false,
			'inserter' => false,
			'lock' => true,
			'anchor' => true
		),
		'opSettings' => array(
			
		),
		'usesContext' => array(
			'tabs/tabsCount',
			'tabs/activeTab'
		),
		'providesContext' => array(
			'classNames' => 'providesClass'
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'providesClass' => array(
				'type' => 'string',
				'default' => 'op-tab-content'
			)
		),
		'parent' => array(
			'omnipress/tabs'
		),
		'textdomain' => 'omnipress'
	),
	'contact-form' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/contact-form',
		'version' => '1.0.0',
		'title' => 'Contact Form 7',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Get started with contact forms – in just a few clicks!',
		'supports' => array(
			'anchor' => true
		),
		'opSettings' => array(
			'form' => array(
				'group' => 'design',
				'selector' => '.op-block__contact-form-wrapper form',
				'label' => 'Form',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'formHeader' => array(
				'group' => 'design',
				'selector' => '.op-block__contact-form-header',
				'label' => 'Header',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'formLabel' => array(
				'group' => 'design',
				'selector' => '.wpcf7-form label',
				'label' => 'Form Label',
				'fields' => array(
					'spacing' => array(
						'margin' => true
					),
					'color' => array(
						'text' => true
					),
					'typography' => true
				)
			),
			'formInput' => array(
				'group' => 'design',
				'selector' => '.wpcf7 .wpcf7-form-control-wrap textarea.wpcf7-form-control, .wpcf7 form input:not([type=file]):not([type=radio]):not([type=checkbox]):not([type=submit])',
				'label' => 'Form Input',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'submitButton' => array(
				'group' => 'design',
				'selector' => '.wpcf7 form input[type=submit]',
				'label' => 'Submit Button',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true,
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'titleStyle' => array(
				'group' => 'design',
				'selector' => '.op-block__contact-form-header h4',
				'label' => 'Form Title',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true
					),
					'typography' => true
				)
			),
			'descriptionStyle' => array(
				'group' => 'design',
				'selector' => '.op-block__contact-form-header p',
				'label' => 'Form Description',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'text' => true
					),
					'typography' => true
				)
			),
			'successMessage' => array(
				'group' => 'design',
				'selector' => '.wpcf7-form.sent .wpcf7-response-output',
				'label' => 'Success Message',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'typography' => true
				)
			),
			'errorMessage' => array(
				'group' => 'design',
				'selector' => '.wpcf7-form-control-wrap .wpcf7-not-valid-tip, .wpcf7-form.invalid .wpcf7-response-output',
				'label' => 'Error Message',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true
					),
					'typography' => true
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'preview' => array(
				'type' => 'boolean',
				'default' => true
			),
			'selectedFormId' => array(
				'type' => 'string'
			),
			'content' => array(
				'type' => 'string',
				'default' => '',
				'source' => 'html',
				'selector' => '.content'
			),
			'hasTitle' => array(
				'type' => 'boolean',
				'default' => true
			),
			'hasDescription' => array(
				'type' => 'boolean',
				'default' => true
			),
			'title' => array(
				'type' => 'string',
				'default' => 'Let\'s Get in Touch'
			),
			'description' => array(
				'type' => 'string',
				'default' => 'We\'re open for any suggestion or just to have a chat.'
			)
		),
		'keywords' => array(
			'contact form',
			'contact form 7'
		),
		'textdomain' => 'omnipress'
	),
	'custom-css' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/css',
		'title' => 'Custom CSS',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Add custom CSS with blocks for styling without theme changes',
		'keywords' => array(
			'custom',
			'css'
		),
		'textdomain' => 'omnipress',
		'attributes' => array(
			'css' => array(
				'type' => 'string'
			),
			'id' => array(
				'type' => 'string'
			)
		),
		'supports' => array(
			'align' => array(
				'wide',
				'full'
			),
			'anchor' => true,
			'className' => true,
			'__unstablePasteTextInline' => true,
			'__experimentalSlashInserter' => true
		)
	),
	'dual-button' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/dualbutton',
		'version' => '1.0.0',
		'title' => 'Dual Buttons',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Design a dual button together with unique features and capabilities for each button',
		'supports' => array(
			'anchor' => true
		),
		'opSettings' => array(
			'wrapper' => array(
				'group' => 'design',
				'selector' => '',
				'label' => 'Wrapper',
				'fields' => array(
					
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					'justifyContent' => 'center'
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'icon' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/icon',
		'version' => '1.0.0',
		'title' => 'Icon',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Add unique and customizable icons to perfectly match your website style',
		'supports' => array(
			'html' => false,
			'anchor' => true
		),
		'attributes' => array(
			'gap' => array(
				'type' => 'string'
			),
			'iconType' => array(
				'type' => 'string',
				'default' => 'default'
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					'fontSize' => '20px',
					'display' => 'flex'
				)
			),
			'customIcon' => array(
				'type' => 'string'
			),
			'iconClassName' => array(
				'type' => 'string',
				'default' => 'fas fa-arrow-alt-circle-right'
			),
			'blockId' => array(
				'type' => 'string'
			)
		),
		'opSettings' => array(
			'wrapper' => array(
				'group' => 'design',
				'selector' => '',
				'label' => 'Icon',
				'fields' => array(
					'typography' => array(
						'colorOnly' => true
					)
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'icons' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/icons',
		'version' => '1.0.0',
		'title' => 'Icons',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Add unique and customizable icons to perfectly match your website style',
		'supports' => array(
			'html' => false,
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'flex' => array(
				'type' => 'object',
				'default' => array(
					
				)
			)
		),
		'opSettings' => array(
			'flex' => array(
				'group' => 'design',
				'selector' => '',
				'label' => 'Icon',
				'fields' => array(
					
				)
			)
		),
		'textdomain' => 'omnipress'
	),
	'team' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/teams-block',
		'version' => '0.1.0',
		'title' => 'Team',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Team Blocks provides customizable blocks for teams, enabling personalized features and functionalities to enhance collaboration and productivity.',
		'supports' => array(
			'className' => true
		),
		'attributes' => array(
			'column' => array(
				'type' => 'number',
				'default' => 3
			),
			'url' => array(
				'type' => 'string',
				'source' => 'attribute',
				'selector' => 'img',
				'attribute' => 'src'
			),
			'imageWidth' => array(
				'type' => 'number'
			),
			'imageBottomSpacing' => array(
				'type' => 'string',
				'default' => 0
			)
		),
		'textdomain' => 'omnipress'
	),
	'product-carousel' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/carousel',
		'version' => '1.2.0',
		'title' => 'Carousel',
		'category' => 'omnipress-woo',
		'icon' => '',
		'description' => 'Create an engaging display of your products that scrolls horizontally',
		'supports' => array(
			'anchor' => true
		),
		'opSettings' => array(
			'navigation' => array(
				'group' => 'design',
				'selector' => '.category-wrapper .op-woo__category-card-wrapper .op-woo__category-card.op-woo__category .op-woo__card',
				'label' => 'Navigation',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'color' => array(
						'background' => true,
						'text' => true
					),
					'typography' => true,
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'pagination' => array(
				'group' => 'design',
				'selector' => '.category-wrapper .op-woo__category-card-wrapper .op-woo__category-card.op-woo__category figure .op-woo__category-image',
				'label' => 'Pagination',
				'fields' => array(
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'color' => array(
						'background' => true,
						'text' => true
					)
				)
			)
		),
		'attributes' => array(
			'childBlockId' => array(
				'type' => 'string',
				'default' => ''
			),
			'css' => array(
				'type' => 'string'
			),
			'blockId' => array(
				'type' => 'string',
				'default' => ''
			),
			'columns' => array(
				'type' => 'number',
				'default' => 3
			),
			'mdColumns' => array(
				'type' => 'number',
				'default' => 2
			),
			'smColumns' => array(
				'type' => 'number',
				'default' => 1
			),
			'gap' => array(
				'type' => 'number',
				'default' => 20
			),
			'mdGap' => array(
				'type' => 'number',
				'default' => 20
			),
			'smGap' => array(
				'type' => 'number',
				'default' => 20
			),
			'carouselType' => array(
				'type' => 'string',
				'default' => 'prod'
			),
			'size' => array(
				'enum' => array(
					'large',
					'small'
				)
			),
			'options' => array(
				'type' => 'string',
				'default' => 'arrow'
			),
			'template' => array(
				'type' => 'array',
				'default' => array(
					array(
						'omnipress/woogrid',
						array(
							
						)
					)
				)
			),
			'arrowPrev' => array(
				'type' => 'string',
				'default' => 'fas fa-angle-left'
			),
			'arrowNext' => array(
				'type' => 'string',
				'default' => 'fas fa-angle-right'
			),
			'navigation' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'pagination' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'autoPlay' => array(
				'type' => 'boolean',
				'default' => false
			),
			'loop' => array(
				'type' => 'boolean',
				'default' => false
			),
			'classNames' => array(
				'type' => 'string',
				'default' => 'swiper-slide'
			),
			'showNavigation' => array(
				'type' => 'boolean',
				'default' => true
			),
			'showPagination' => array(
				'type' => 'boolean',
				'default' => false
			),
			'showScrollbar' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'providesContext' => array(
			'classNames' => 'classNames'
		),
		'keywords' => array(
			'slider',
			'woocommerce',
			'carousel',
			'products'
		),
		'textdomain' => 'omnipress',
		'viewScript' => array(
			'omnipress-slider-script'
		),
		'style' => array(
			'omnipress-slider-style'
		)
	),
	'product-category' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/woocategory',
		'version' => '1.0.0',
		'title' => 'Products Category Grid',
		'category' => 'omnipress-woo',
		'icon' => '',
		'description' => 'Product Category Grid - Display a list of products from WooCommerce product category with a chosen preset style, offering flexibility in how it looks with different settings.',
		'supports' => array(
			'anchor' => true
		),
		'opSettings' => array(
			'card' => array(
				'group' => 'design',
				'selector' => '.op-woo__category-card',
				'label' => 'Card',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'grid' => array(
				'group' => 'design',
				'selector' => '.omnipress-layout-grid',
				'label' => 'Card',
				'fields' => array(
					
				)
			),
			'image' => array(
				'group' => 'design',
				'selector' => 'figure .op-woo__category-image',
				'label' => 'Image',
				'fields' => array(
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'margin' => true
					),
					'border' => array(
						'border' => false,
						'borderRadius' => true
					)
				)
			),
			'title' => array(
				'group' => 'design',
				'selector' => '.op-woo__category-title',
				'label' => 'Title',
				'fields' => array(
					'color' => array(
						'text' => true,
						'background' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'count' => array(
				'group' => 'design',
				'selector' => '.product-category-count',
				'label' => 'Count',
				'fields' => array(
					'color' => array(
						'background' => true,
						'text' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'content' => array(
				'group' => 'design',
				'selector' => '.op-woo__card-content',
				'label' => 'Content',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			)
		),
		'usesContext' => array(
			'classNames'
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'css' => array(
				'type' => 'string'
			),
			'card' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'perPage' => array(
				'type' => 'number',
				'default' => 6
			),
			'columns' => array(
				'type' => 'number',
				'default' => 6
			),
			'mdColumns' => array(
				'type' => 'number',
				'default' => 3
			),
			'smColumns' => array(
				'type' => 'number',
				'default' => 2
			),
			'grid' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'rows' => array(
				'type' => 'number',
				'default' => 1
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'categoryTitle' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'arrowNext' => array(
				'type' => 'string',
				'default' => 'fa fa-angle-right'
			),
			'arrowPrev' => array(
				'default' => 'fa fa-angle-left',
				'type' => 'string'
			),
			'preset' => array(
				'type' => 'string',
				'default' => 'one'
			),
			'productsCount' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'subCategory' => array(
				'type' => 'boolean',
				'default' => true
			),
			'categoryButton' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'categoryImage' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'cardContent' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'carousel' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'woocommerce',
			'categories',
			'category',
			'product category',
			'product category'
		),
		'style' => array(
			'omnipress/block/layout'
		)
	),
	'product-category-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/woocategory-list',
		'version' => '1.0.0',
		'title' => 'Products Category List',
		'category' => 'omnipress-woo',
		'icon' => '',
		'description' => 'Display WooCommerce product categories in a list view',
		'supports' => array(
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'preset' => array(
				'type' => 'string',
				'default' => 'one'
			),
			'hasEmpty' => array(
				'type' => 'boolean',
				'default' => true
			),
			'hasImage' => array(
				'type' => 'boolean',
				'default' => true
			),
			'hasCount' => array(
				'type' => 'boolean',
				'default' => true
			),
			'layout' => array(
				'type' => 'number',
				'default' => 1
			),
			'isDropdown' => array(
				'type' => 'boolean',
				'default' => false
			),
			'categorySelected' => array(
				'type' => 'boolean',
				'default' => false
			),
			'selectedCategoriesList' => array(
				'type' => 'array',
				'default' => array(
					
				)
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'item' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'image' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'label' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'count' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'showChildOnly' => array(
				'type' => 'boolean',
				'default' => false
			)
		),
		'opSettings' => array(
			'item' => array(
				'group' => 'design',
				'selector' => '.op-woo-catlist__item',
				'label' => 'List Item',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'image' => array(
				'group' => 'design',
				'selector' => 'img.op-woo-catlist__item-image',
				'label' => 'Image',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'image' => true
				)
			),
			'label' => array(
				'group' => 'design',
				'selector' => '.op-woo-catlist__item-title h4',
				'label' => 'Label',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'count' => array(
				'group' => 'design',
				'selector' => '.op-woo-catlist__item-product-count',
				'label' => 'Count',
				'fields' => array(
					'color' => array(
						'background' => true
					),
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			)
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'woocommerce',
			'woo',
			'category',
			'products'
		)
	),
	'product-grid' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/woogrid',
		'version' => '1.0.0',
		'title' => 'Products Grid',
		'category' => 'omnipress-woo',
		'icon' => '',
		'description' => 'Display WooCommerce products in a grid layout',
		'supports' => array(
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'carousel' => array(
				'type' => 'boolean',
				'default' => false
			),
			'options' => array(
				'type' => 'string',
				'default' => 'arrow'
			),
			'arrowNext' => array(
				'type' => 'string',
				'default' => 'fa fa-angle-right'
			),
			'arrowPrev' => array(
				'type' => 'string',
				'default' => 'fa fa-angle-left'
			),
			'layout' => array(
				'type' => 'string'
			),
			'toggle' => array(
				'type' => 'object',
				'default' => array(
					'title' => true,
					'image' => true,
					'addToCart' => true,
					'price' => true,
					'regularPrice' => true,
					'badge' => true,
					'ratings' => true,
					'discountPercent' => true
				)
			),
			'rows' => array(
				'type' => 'number'
			),
			'offset' => array(
				'type' => 'number',
				'default' => 0
			),
			'columns' => array(
				'type' => 'number',
				'default' => 3
			),
			'mdColumns' => array(
				'type' => 'number',
				'default' => 3
			),
			'smColumns' => array(
				'type' => 'number',
				'default' => 2
			),
			'perPage' => array(
				'type' => 'number',
				'default' => 6
			),
			'grid' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'orderBy' => array(
				'type' => 'string',
				'default' => 'popularity'
			),
			'category' => array(
				'type' => 'string'
			),
			'gridWrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'mediaWrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'mediaWrapperImg' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'card' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'title' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'price' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'sale' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'discountedPrice' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'discount' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'ratings' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'addToCart' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'sortType' => array(
				'type' => 'string'
			),
			'content' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'outstock' => array(
				'type' => 'object',
				'default' => array(
					
				)
			)
		),
		'opSettings' => array(
			'content' => array(
				'group' => 'design',
				'selector' => '.op-product-item__details.op-woo__content',
				'label' => 'Content',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'grid' => array(
				'group' => 'design',
				'selector' => '.omnipress-layout-grid',
				'label' => 'Content',
				'fields' => array(
					
				)
			),
			'mediaWrapperImg' => array(
				'group' => 'design',
				'selector' => '.op-woo__media-wrapper-img',
				'label' => 'Image',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'dimension' => array(
						'height' => true,
						'width' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'image' => true
				)
			),
			'title' => array(
				'group' => 'design',
				'selector' => '.op-woo__card .op-woo__title',
				'label' => 'Title',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'discount' => array(
				'group' => 'design',
				'selector' => '.op-woo__discount',
				'label' => 'Discount',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'ratings' => array(
				'group' => 'design',
				'selector' => '.op-woo__ratings',
				'label' => 'Ratings',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'addToCart' => array(
				'group' => 'design',
				'selector' => '.op-woo__add-to-cart',
				'label' => 'Add to cart',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'outstock' => array(
				'group' => 'design',
				'selector' => '.op-woo__outstock',
				'label' => 'Out of stock',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'sale' => array(
				'group' => 'design',
				'selector' => '.op-woo__sale',
				'label' => 'Sale Tag',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			)
		),
		'viewScriptModule' => array(
			'omnipress/woogrid'
		),
		'usesContext' => array(
			'classNames'
		),
		'textdomain' => 'product_grid',
		'style' => array(
			'omnipress/block/layout'
		),
		'keywords' => array(
			'grid',
			'layout',
			'woogrid',
			'woo',
			'woo Layout'
		)
	),
	'product-list' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/product-list',
		'version' => '1.0.0',
		'title' => 'Product List',
		'category' => 'omnipress',
		'icon' => '',
		'description' => 'Display WooCommerce products in a list view',
		'supports' => array(
			'html' => false,
			'anchor' => true
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'sortType' => array(
				'type' => 'string'
			),
			'sortOrder' => array(
				'type' => 'string'
			),
			'rows' => array(
				'type' => 'number'
			),
			'category' => array(
				'type' => 'string'
			),
			'offset' => array(
				'type' => 'number'
			),
			'toggle' => array(
				'type' => 'object',
				'default' => array(
					'title' => true,
					'description' => true,
					'image' => true,
					'price' => true,
					'cart' => true,
					'badge' => true,
					'ratings' => true,
					'discount' => true,
					'categories' => true
				)
			),
			'isHandPicked' => array(
				'type' => 'boolean',
				'default' => false
			),
			'selectedProducts' => array(
				'type' => 'array',
				'default' => array(
					
				)
			),
			'hasEmpty' => array(
				'type' => 'boolean',
				'default' => true
			),
			'hasImage' => array(
				'type' => 'boolean',
				'default' => true
			),
			'hasCount' => array(
				'type' => 'boolean',
				'default' => true
			),
			'layout' => array(
				'type' => 'number',
				'default' => 1
			),
			'wrapper' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'item' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'image' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'title' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'description' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'reviewCount' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'saleTag' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'discount' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'regularPrice' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'salePrice' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'rating' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'categories' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'addToCart' => array(
				'type' => 'object',
				'default' => array(
					
				)
			)
		),
		'opSettings' => array(
			'item' => array(
				'group' => 'design',
				'selector' => '.product-item',
				'label' => 'Content',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'mediaWrapperImg' => array(
				'group' => 'design',
				'selector' => '.product-item-image img',
				'label' => 'Image',
				'fields' => array(
					'spacing' => array(
						'margin' => true,
						'padding' => true
					),
					'dimension' => array(
						'height' => true,
						'width' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'image' => true
				)
			),
			'title' => array(
				'group' => 'design',
				'selector' => '.product-item-title h4',
				'label' => 'Title',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'description' => array(
				'group' => 'design',
				'selector' => '.product-item-description',
				'label' => 'Products Description',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'regularPrice' => array(
				'group' => 'design',
				'selector' => '.product-item-price .product-item-price',
				'label' => 'Price',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'categories' => array(
				'group' => 'design',
				'selector' => '.product-item-category-list a',
				'label' => 'Categories',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'discount' => array(
				'group' => 'design',
				'selector' => '.product-item-inner .op-discount',
				'label' => 'Discount',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'saleTag' => array(
				'group' => 'design',
				'selector' => '.product-item-inner .op-onsale',
				'label' => 'Sale Tag',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'ratings' => array(
				'group' => 'design',
				'selector' => '.product-item-rating',
				'label' => 'Ratings',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'text' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'reviewCount' => array(
				'group' => 'design',
				'selector' => '.product-item-reviews-count',
				'label' => 'Reviews count',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			),
			'addToCart' => array(
				'group' => 'design',
				'selector' => '.op-add_to_cart',
				'label' => 'Add to cart',
				'fields' => array(
					'spacing' => array(
						'padding' => true
					),
					'color' => array(
						'background' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					),
					'typography' => true
				)
			)
		),
		'viewScriptModule' => array(
			'omnipress/woogrid'
		),
		'textdomain' => 'omnipress',
		'keywords' => array(
			'woocommerce',
			'woo',
			'category',
			'products'
		)
	),
	'single-product' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 2,
		'name' => 'omnipress/single-product',
		'title' => 'Single Product',
		'category' => 'omnipress-woo',
		'icon' => 'grid-view',
		'providesContext' => array(
			
		),
		'usesContext' => array(
			'postType',
			'postId',
			'queryId',
			'post'
		),
		'textdomain' => 'omnipress',
		'supports' => array(
			'interactivity' => true
		),
		'parent' => array(
			'omnipress/query-template'
		),
		'opSettings' => array(
			'title' => array(
				'group' => 'design',
				'selector' => '.post-title > a',
				'label' => 'Title',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'image' => array(
				'group' => 'design',
				'selector' => '.post-thumbnail',
				'label' => 'Thumbnail',
				'fields' => array(
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'categories' => array(
				'group' => 'design',
				'selector' => '.product-categories > a',
				'label' => 'Categories',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'price' => array(
				'group' => 'design',
				'selector' => '.woocommerce-Price-amount',
				'label' => 'Price',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'sale_price' => array(
				'group' => 'design',
				'selector' => '.woocommerce-Price-amount:not(del > .woocommerce-Price-amount)',
				'label' => 'sale Price',
				'fields' => array(
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'typography' => true
				)
			),
			'add_to_cart' => array(
				'group' => 'design',
				'selector' => '.add-to-cart.button',
				'label' => 'Add to Cart',
				'fields' => array(
					'typography' => true,
					'color' => array(
						'background' => true
					),
					'dimension' => array(
						'width' => true,
						'height' => true
					),
					'spacing' => array(
						'padding' => true,
						'margin' => true
					),
					'border' => array(
						'border' => true,
						'borderRadius' => true
					)
				)
			),
			'ratings' => array(
				'group' => 'design',
				'selector' => '.woocommerce-product-rating li',
				'label' => 'Ratings',
				'fields' => array(
					'typography' => true,
					'dimension' => array(
						'gap' => true,
						'margin' => true,
						'padding' => true
					)
				)
			)
		),
		'attributes' => array(
			'blockId' => array(
				'type' => 'string'
			),
			'productId' => array(
				'type' => 'number'
			),
			'layout' => array(
				'type' => 'object',
				'default' => array(
					
				)
			),
			'layoutType' => array(
				'type' => 'string',
				'default' => 'one'
			)
		),
		'keywords' => array(
			'product',
			'block',
			'product block',
			'single product'
		)
	)
);
