<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a00ed8feb9adbf4ee71c71c6ddc5e12
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Omnipress\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Omnipress\\' => 
        array (
            0 => __DIR__ . '/../..' . '/includes',
            1 => __DIR__ . '/../..' . '/classes',
            2 => __DIR__ . '/../..' . '/!includes/Libraries',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'OMNIPRESS\\Core\\FileSystemUtil' => __DIR__ . '/../..' . '/includes/Core/FileSystemUtil.php',
        'OMNIPRESS\\Helpers\\WCHelpers' => __DIR__ . '/../..' . '/includes/Helpers/WCHelpers.php',
        'Omnipress\\Abstracts\\AbstractBlock' => __DIR__ . '/../..' . '/includes/Abstracts/AbstractBlock.php',
        'Omnipress\\Abstracts\\BlockTemplateBase' => __DIR__ . '/../..' . '/includes/Abstracts/BlockTemplateBase.php',
        'Omnipress\\Abstracts\\ModelsBase' => __DIR__ . '/../..' . '/includes/Abstracts/ModelsBase.php',
        'Omnipress\\Abstracts\\RestControllersBase' => __DIR__ . '/../..' . '/includes/Abstracts/RestControllersBase.php',
        'Omnipress\\Admin\\Init' => __DIR__ . '/../..' . '/includes/Admin/Init.php',
        'Omnipress\\BlockTemplates' => __DIR__ . '/../..' . '/includes/BlockTemplates.php',
        'Omnipress\\Blocks\\BlockAssetsManager' => __DIR__ . '/../..' . '/includes/Blocks/BlockAssetsManager.php',
        'Omnipress\\Blocks\\BlockGeneralSettings' => __DIR__ . '/../..' . '/includes/Blocks/BlockGeneralSettings.php',
        'Omnipress\\Blocks\\BlockRegistrar' => __DIR__ . '/../..' . '/includes/Blocks/BlockRegistrar.php',
        'Omnipress\\Blocks\\BlockStyles' => __DIR__ . '/../..' . '/includes/Blocks/BlockStyles.php',
        'Omnipress\\Blocks\\BlockTypes\\Accordion' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Accordion.php',
        'Omnipress\\Blocks\\BlockTypes\\Button' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Button.php',
        'Omnipress\\Blocks\\BlockTypes\\Carousel' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Carousel.php',
        'Omnipress\\Blocks\\BlockTypes\\Container' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Container.php',
        'Omnipress\\Blocks\\BlockTypes\\ContentSwitcher' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ContentSwitcher.php',
        'Omnipress\\Blocks\\BlockTypes\\ContentSwitcherContents' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ContentSwitcherContents.php',
        'Omnipress\\Blocks\\BlockTypes\\ContentSwitcherSwitch' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ContentSwitcherSwitch.php',
        'Omnipress\\Blocks\\BlockTypes\\Counter' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Counter.php',
        'Omnipress\\Blocks\\BlockTypes\\Dualbutton' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Dualbutton.php',
        'Omnipress\\Blocks\\BlockTypes\\DynamicAbstract' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/DynamicAbstract.php',
        'Omnipress\\Blocks\\BlockTypes\\DynamicFieldQuery' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/DynamicFieldQuery.php',
        'Omnipress\\Blocks\\BlockTypes\\Heading' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Heading.php',
        'Omnipress\\Blocks\\BlockTypes\\IconBox' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/IconBox.php',
        'Omnipress\\Blocks\\BlockTypes\\Image' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Image.php',
        'Omnipress\\Blocks\\BlockTypes\\Megamenu' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Megamenu.php',
        'Omnipress\\Blocks\\BlockTypes\\Menuitem' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Menuitem.php',
        'Omnipress\\Blocks\\BlockTypes\\Popup' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Popup.php',
        'Omnipress\\Blocks\\BlockTypes\\PostGrid' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/PostGrid.php',
        'Omnipress\\Blocks\\BlockTypes\\PostsBlock' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/PostsBlock.php',
        'Omnipress\\Blocks\\BlockTypes\\ProductBlockAbstract' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ProductBlockAbstract.php',
        'Omnipress\\Blocks\\BlockTypes\\ProductContent' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ProductContent.php',
        'Omnipress\\Blocks\\BlockTypes\\ProductFilter' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ProductFilter.php',
        'Omnipress\\Blocks\\BlockTypes\\ProductList' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ProductList.php',
        'Omnipress\\Blocks\\BlockTypes\\ProductMeta' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ProductMeta.php',
        'Omnipress\\Blocks\\BlockTypes\\ProductTitle' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/ProductTitle.php',
        'Omnipress\\Blocks\\BlockTypes\\QueryLoop' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/QueryLoop.php',
        'Omnipress\\Blocks\\BlockTypes\\QueryNoResults' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/QueryNoResults.php',
        'Omnipress\\Blocks\\BlockTypes\\QueryPaginationNext' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/QueryPaginationNext.php',
        'Omnipress\\Blocks\\BlockTypes\\QueryPaginationNumbers' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/QueryPaginationNumbers.php',
        'Omnipress\\Blocks\\BlockTypes\\QueryPaginationPrevious' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/QueryPaginationPrevious.php',
        'Omnipress\\Blocks\\BlockTypes\\QueryTemplate' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/QueryTemplate.php',
        'Omnipress\\Blocks\\BlockTypes\\SingleProduct' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/SingleProduct.php',
        'Omnipress\\Blocks\\BlockTypes\\Slider' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Slider.php',
        'Omnipress\\Blocks\\BlockTypes\\Utils' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Utils.php',
        'Omnipress\\Blocks\\BlockTypes\\Woocategory' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Woocategory.php',
        'Omnipress\\Blocks\\BlockTypes\\WoocategoryList' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/WoocategoryList.php',
        'Omnipress\\Blocks\\BlockTypes\\WoocommerceProducts' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/WoocommerceProducts.php',
        'Omnipress\\Blocks\\BlockTypes\\Woogrid' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/Woogrid.php',
        'Omnipress\\Blocks\\BlockTypes\\WpFormsExtender' => __DIR__ . '/../..' . '/includes/Blocks/BlockTypes/WpFormsExtender.php',
        'Omnipress\\Controllers\\SettingsController' => __DIR__ . '/../..' . '/includes/Controllers/SettingsController.php',
        'Omnipress\\Controllers\\ThemeFontsHandler' => __DIR__ . '/../..' . '/includes/Controllers/ThemeFontsHandler.php',
        'Omnipress\\Core\\BasePostFields' => __DIR__ . '/../..' . '/includes/Core/BasePostFields.php',
        'Omnipress\\Core\\StyleGenerator' => __DIR__ . '/../..' . '/includes/Core/StyleGenerator.php',
        'Omnipress\\Core\\Utils' => __DIR__ . '/../..' . '/includes/Core/Utils.php',
        'Omnipress\\Core\\WoocommerceFields' => __DIR__ . '/../..' . '/includes/Core/WoocommerceFields.php',
        'Omnipress\\Helpers' => __DIR__ . '/../..' . '/includes/Helpers.php',
        'Omnipress\\Helpers\\BlockStylesHelper' => __DIR__ . '/../..' . '/includes/Helpers/BlockStylesHelper.php',
        'Omnipress\\Helpers\\GeneralHelpers' => __DIR__ . '/../..' . '/includes/Helpers/GeneralHelpers.php',
        'Omnipress\\Helpers\\StyleGeneratorHelper' => __DIR__ . '/../..' . '/includes/Helpers/StyleGeneratorHelper.php',
        'Omnipress\\Init' => __DIR__ . '/../..' . '/includes/Init.php',
        'Omnipress\\Models\\BlocksModel' => __DIR__ . '/../..' . '/includes/Models/BlocksModel.php',
        'Omnipress\\Models\\BlocksSettingsModel' => __DIR__ . '/../..' . '/includes/Models/BlocksSettingsModel.php',
        'Omnipress\\Models\\DemosModel' => __DIR__ . '/../..' . '/includes/Models/DemosModel.php',
        'Omnipress\\Models\\FontsModel' => __DIR__ . '/../..' . '/includes/Models/FontsModel.php',
        'Omnipress\\Models\\FormModel' => __DIR__ . '/../..' . '/includes/Models/FormModel.php',
        'Omnipress\\Models\\GlobalStylesModel' => __DIR__ . '/../..' . '/includes/Models/GlobalStylesModel.php',
        'Omnipress\\Models\\PatternsModel' => __DIR__ . '/../..' . '/includes/Models/PatternsModel.php',
        'Omnipress\\Models\\UsersModel' => __DIR__ . '/../..' . '/includes/Models/UsersModel.php',
        'Omnipress\\Models\\WoocommerceModel' => __DIR__ . '/../..' . '/includes/Models/WoocommerceModel.php',
        'Omnipress\\Models\\WpFormsModal' => __DIR__ . '/../..' . '/includes/Models/WpFormsModal.php',
        'Omnipress\\Publics\\CSSUtils' => __DIR__ . '/../..' . '/includes/Publics/CSSUtils.php',
        'Omnipress\\Publics\\Init' => __DIR__ . '/../..' . '/includes/Publics/Init.php',
        'Omnipress\\RestApi\\Controllers\\V1\\BlockSettingsController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/BlockSettingsController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\ChangelogController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/ChangelogController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\DemosController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/DemosController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\FontsController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/FontsController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\GlobalStylesController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/GlobalStylesController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\PatternsController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/PatternsController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\UsersController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/UsersController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\WoocommerceController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/WoocommerceController.php',
        'Omnipress\\RestApi\\Controllers\\V1\\WpFormsController' => __DIR__ . '/../..' . '/includes/RestApi/Controllers/V1/WpFormsController.php',
        'Omnipress\\RestApi\\RestApi' => __DIR__ . '/../..' . '/includes/RestApi/RestApi.php',
        'Omnipress\\Traits\\Singleton' => __DIR__ . '/../..' . '/includes/Traits/Singleton.php',
        'Omnipress\\Transient' => __DIR__ . '/../..' . '/includes/Transient.php',
        'Omnipress\\WoocommerceBlocks' => __DIR__ . '/../..' . '/includes/WoocommerceBlocks.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a00ed8feb9adbf4ee71c71c6ddc5e12::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a00ed8feb9adbf4ee71c71c6ddc5e12::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a00ed8feb9adbf4ee71c71c6ddc5e12::$classMap;

        }, null, ClassLoader::class);
    }
}
