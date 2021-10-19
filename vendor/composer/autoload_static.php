<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita874c6664959859850c6e51f6ff4d3b4
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'setasign\\Fpdi\\' => 14,
        ),
        'V' => 
        array (
            'Vendidero\\Germanized\\Shipments\\' => 31,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'D' => 
        array (
            'DVDoug\\BoxPacker\\Test\\' => 22,
            'DVDoug\\BoxPacker\\' => 17,
        ),
        'A' => 
        array (
            'Automattic\\Jetpack\\Autoloader\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'setasign\\Fpdi\\' => 
        array (
            0 => __DIR__ . '/..' . '/setasign/fpdi/src',
        ),
        'Vendidero\\Germanized\\Shipments\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'DVDoug\\BoxPacker\\Test\\' => 
        array (
            0 => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test',
        ),
        'DVDoug\\BoxPacker\\' => 
        array (
            0 => __DIR__ . '/..' . '/dvdoug/boxpacker/src',
        ),
        'Automattic\\Jetpack\\Autoloader\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src',
        ),
    );

    public static $classMap = array (
        'Automattic\\Jetpack\\Autoloader\\AutoloadFileWriter' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/AutoloadFileWriter.php',
        'Automattic\\Jetpack\\Autoloader\\AutoloadGenerator' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/AutoloadGenerator.php',
        'Automattic\\Jetpack\\Autoloader\\AutoloadProcessor' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/AutoloadProcessor.php',
        'Automattic\\Jetpack\\Autoloader\\CustomAutoloaderPlugin' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/CustomAutoloaderPlugin.php',
        'Automattic\\Jetpack\\Autoloader\\ManifestGenerator' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/ManifestGenerator.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'DVDoug\\BoxPacker\\Box' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/Box.php',
        'DVDoug\\BoxPacker\\BoxList' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/BoxList.php',
        'DVDoug\\BoxPacker\\ConstrainedItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/ConstrainedItem.php',
        'DVDoug\\BoxPacker\\ConstrainedPlacementItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/ConstrainedPlacementItem.php',
        'DVDoug\\BoxPacker\\InfalliblePacker' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/InfalliblePacker.php',
        'DVDoug\\BoxPacker\\Item' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/Item.php',
        'DVDoug\\BoxPacker\\ItemList' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/ItemList.php',
        'DVDoug\\BoxPacker\\ItemTooLargeException' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/ItemTooLargeException.php',
        'DVDoug\\BoxPacker\\LayerPacker' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/LayerPacker.php',
        'DVDoug\\BoxPacker\\LayerStabiliser' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/LayerStabiliser.php',
        'DVDoug\\BoxPacker\\LimitedSupplyBox' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/LimitedSupplyBox.php',
        'DVDoug\\BoxPacker\\NoBoxesAvailableException' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/NoBoxesAvailableException.php',
        'DVDoug\\BoxPacker\\OrientatedItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/OrientatedItem.php',
        'DVDoug\\BoxPacker\\OrientatedItemFactory' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/OrientatedItemFactory.php',
        'DVDoug\\BoxPacker\\OrientatedItemSorter' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/OrientatedItemSorter.php',
        'DVDoug\\BoxPacker\\PackedBox' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/PackedBox.php',
        'DVDoug\\BoxPacker\\PackedBoxList' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/PackedBoxList.php',
        'DVDoug\\BoxPacker\\PackedItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/PackedItem.php',
        'DVDoug\\BoxPacker\\PackedItemList' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/PackedItemList.php',
        'DVDoug\\BoxPacker\\PackedLayer' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/PackedLayer.php',
        'DVDoug\\BoxPacker\\Packer' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/Packer.php',
        'DVDoug\\BoxPacker\\Test\\ConstrainedPlacementByCountTestItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test/ConstrainedPlacementByCountTestItem.php',
        'DVDoug\\BoxPacker\\Test\\ConstrainedPlacementNoStackingTestItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test/ConstrainedPlacementNoStackingTestItem.php',
        'DVDoug\\BoxPacker\\Test\\ConstrainedTestItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test/ConstrainedTestItem.php',
        'DVDoug\\BoxPacker\\Test\\LimitedSupplyTestBox' => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test/LimitedSupplyTestBox.php',
        'DVDoug\\BoxPacker\\Test\\THPackTestItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test/THPackTestItem.php',
        'DVDoug\\BoxPacker\\Test\\TestBox' => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test/TestBox.php',
        'DVDoug\\BoxPacker\\Test\\TestItem' => __DIR__ . '/..' . '/dvdoug/boxpacker/tests/Test/TestItem.php',
        'DVDoug\\BoxPacker\\VolumePacker' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/VolumePacker.php',
        'DVDoug\\BoxPacker\\WeightRedistributor' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/WeightRedistributor.php',
        'DVDoug\\BoxPacker\\WorkingVolume' => __DIR__ . '/..' . '/dvdoug/boxpacker/src/WorkingVolume.php',
        'FPDF' => __DIR__ . '/..' . '/setasign/fpdf/fpdf.php',
        'Psr\\Log\\AbstractLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/AbstractLogger.php',
        'Psr\\Log\\InvalidArgumentException' => __DIR__ . '/..' . '/psr/log/Psr/Log/InvalidArgumentException.php',
        'Psr\\Log\\LogLevel' => __DIR__ . '/..' . '/psr/log/Psr/Log/LogLevel.php',
        'Psr\\Log\\LoggerAwareInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareInterface.php',
        'Psr\\Log\\LoggerAwareTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerAwareTrait.php',
        'Psr\\Log\\LoggerInterface' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerInterface.php',
        'Psr\\Log\\LoggerTrait' => __DIR__ . '/..' . '/psr/log/Psr/Log/LoggerTrait.php',
        'Psr\\Log\\NullLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/NullLogger.php',
        'Psr\\Log\\Test\\DummyTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/DummyTest.php',
        'Psr\\Log\\Test\\LoggerInterfaceTest' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/LoggerInterfaceTest.php',
        'Psr\\Log\\Test\\TestLogger' => __DIR__ . '/..' . '/psr/log/Psr/Log/Test/TestLogger.php',
        'Vendidero\\Germanized\\Shipments\\AddressSplitter' => __DIR__ . '/../..' . '/src/AddressSplitter.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\Admin' => __DIR__ . '/../..' . '/src/Admin/Admin.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\BulkActionHandler' => __DIR__ . '/../..' . '/src/Admin/BulkActionHandler.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\BulkLabel' => __DIR__ . '/../..' . '/src/Admin/BulkLabel.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\MetaBox' => __DIR__ . '/../..' . '/src/Admin/MetaBox.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\ProviderSettings' => __DIR__ . '/../..' . '/src/Admin/ProviderSettings.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\ReturnTable' => __DIR__ . '/../..' . '/src/Admin/ReturnTable.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\Settings' => __DIR__ . '/../..' . '/src/Admin/Settings.php',
        'Vendidero\\Germanized\\Shipments\\Admin\\Table' => __DIR__ . '/../..' . '/src/Admin/Table.php',
        'Vendidero\\Germanized\\Shipments\\Ajax' => __DIR__ . '/../..' . '/src/Ajax.php',
        'Vendidero\\Germanized\\Shipments\\Api' => __DIR__ . '/../..' . '/src/Api.php',
        'Vendidero\\Germanized\\Shipments\\Automation' => __DIR__ . '/../..' . '/src/Automation.php',
        'Vendidero\\Germanized\\Shipments\\DataStores\\Label' => __DIR__ . '/../..' . '/src/DataStores/Label.php',
        'Vendidero\\Germanized\\Shipments\\DataStores\\Packaging' => __DIR__ . '/../..' . '/src/DataStores/Packaging.php',
        'Vendidero\\Germanized\\Shipments\\DataStores\\Shipment' => __DIR__ . '/../..' . '/src/DataStores/Shipment.php',
        'Vendidero\\Germanized\\Shipments\\DataStores\\ShipmentItem' => __DIR__ . '/../..' . '/src/DataStores/ShipmentItem.php',
        'Vendidero\\Germanized\\Shipments\\DataStores\\ShippingProvider' => __DIR__ . '/../..' . '/src/DataStores/ShippingProvider.php',
        'Vendidero\\Germanized\\Shipments\\Emails' => __DIR__ . '/../..' . '/src/Emails.php',
        'Vendidero\\Germanized\\Shipments\\FormHandler' => __DIR__ . '/../..' . '/src/FormHandler.php',
        'Vendidero\\Germanized\\Shipments\\Install' => __DIR__ . '/../..' . '/src/Install.php',
        'Vendidero\\Germanized\\Shipments\\Interfaces\\ShipmentLabel' => __DIR__ . '/../..' . '/src/Interfaces/ShipmentLabel.php',
        'Vendidero\\Germanized\\Shipments\\Interfaces\\ShipmentReturnLabel' => __DIR__ . '/../..' . '/src/Interfaces/ShipmentReturnLabel.php',
        'Vendidero\\Germanized\\Shipments\\Interfaces\\ShippingProvider' => __DIR__ . '/../..' . '/src/Interfaces/ShippingProvider.php',
        'Vendidero\\Germanized\\Shipments\\Interfaces\\ShippingProviderAuto' => __DIR__ . '/../..' . '/src/Interfaces/ShippingProviderAuto.php',
        'Vendidero\\Germanized\\Shipments\\Labels\\Automation' => __DIR__ . '/../..' . '/src/Labels/Automation.php',
        'Vendidero\\Germanized\\Shipments\\Labels\\DownloadHandler' => __DIR__ . '/../..' . '/src/Labels/DownloadHandler.php',
        'Vendidero\\Germanized\\Shipments\\Labels\\Factory' => __DIR__ . '/../..' . '/src/Labels/Factory.php',
        'Vendidero\\Germanized\\Shipments\\Labels\\Label' => __DIR__ . '/../..' . '/src/Labels/Label.php',
        'Vendidero\\Germanized\\Shipments\\Labels\\Query' => __DIR__ . '/../..' . '/src/Labels/Query.php',
        'Vendidero\\Germanized\\Shipments\\Labels\\ReturnLabel' => __DIR__ . '/../..' . '/src/Labels/ReturnLabel.php',
        'Vendidero\\Germanized\\Shipments\\Order' => __DIR__ . '/../..' . '/src/Order.php',
        'Vendidero\\Germanized\\Shipments\\PDFMerger' => __DIR__ . '/../..' . '/src/PDFMerger.php',
        'Vendidero\\Germanized\\Shipments\\PDFSplitter' => __DIR__ . '/../..' . '/src/PDFSplitter.php',
        'Vendidero\\Germanized\\Shipments\\Package' => __DIR__ . '/../..' . '/src/Package.php',
        'Vendidero\\Germanized\\Shipments\\Packaging' => __DIR__ . '/../..' . '/src/Packaging.php',
        'Vendidero\\Germanized\\Shipments\\PackagingFactory' => __DIR__ . '/../..' . '/src/PackagingFactory.php',
        'Vendidero\\Germanized\\Shipments\\Packing\\Helper' => __DIR__ . '/../..' . '/src/Packing/Helper.php',
        'Vendidero\\Germanized\\Shipments\\Packing\\OrderItem' => __DIR__ . '/../..' . '/src/Packing/OrderItem.php',
        'Vendidero\\Germanized\\Shipments\\Packing\\PackagingBox' => __DIR__ . '/../..' . '/src/Packing/PackagingBox.php',
        'Vendidero\\Germanized\\Shipments\\Packing\\ShipmentItem' => __DIR__ . '/../..' . '/src/Packing/ShipmentItem.php',
        'Vendidero\\Germanized\\Shipments\\Product' => __DIR__ . '/../..' . '/src/Product.php',
        'Vendidero\\Germanized\\Shipments\\ReturnReason' => __DIR__ . '/../..' . '/src/ReturnReason.php',
        'Vendidero\\Germanized\\Shipments\\ReturnShipment' => __DIR__ . '/../..' . '/src/ReturnShipment.php',
        'Vendidero\\Germanized\\Shipments\\Shipment' => __DIR__ . '/../..' . '/src/Shipment.php',
        'Vendidero\\Germanized\\Shipments\\ShipmentFactory' => __DIR__ . '/../..' . '/src/ShipmentFactory.php',
        'Vendidero\\Germanized\\Shipments\\ShipmentItem' => __DIR__ . '/../..' . '/src/ShipmentItem.php',
        'Vendidero\\Germanized\\Shipments\\ShipmentQuery' => __DIR__ . '/../..' . '/src/ShipmentQuery.php',
        'Vendidero\\Germanized\\Shipments\\ShipmentReturnItem' => __DIR__ . '/../..' . '/src/ShipmentReturnItem.php',
        'Vendidero\\Germanized\\Shipments\\ShippingProvider\\Auto' => __DIR__ . '/../..' . '/src/ShippingProvider/Auto.php',
        'Vendidero\\Germanized\\Shipments\\ShippingProvider\\Helper' => __DIR__ . '/../..' . '/src/ShippingProvider/Helper.php',
        'Vendidero\\Germanized\\Shipments\\ShippingProvider\\Method' => __DIR__ . '/../..' . '/src/ShippingProvider/Method.php',
        'Vendidero\\Germanized\\Shipments\\ShippingProvider\\MethodPlaceholder' => __DIR__ . '/../..' . '/src/ShippingProvider/MethodPlaceholder.php',
        'Vendidero\\Germanized\\Shipments\\ShippingProvider\\Simple' => __DIR__ . '/../..' . '/src/ShippingProvider/Simple.php',
        'Vendidero\\Germanized\\Shipments\\SimpleShipment' => __DIR__ . '/../..' . '/src/SimpleShipment.php',
        'Vendidero\\Germanized\\Shipments\\Validation' => __DIR__ . '/../..' . '/src/Validation.php',
        'Vendidero\\Germanized\\Shipments\\WPMLHelper' => __DIR__ . '/../..' . '/src/WPMLHelper.php',
        'setasign\\Fpdi\\FpdfTpl' => __DIR__ . '/..' . '/setasign/fpdi/src/FpdfTpl.php',
        'setasign\\Fpdi\\FpdfTplTrait' => __DIR__ . '/..' . '/setasign/fpdi/src/FpdfTplTrait.php',
        'setasign\\Fpdi\\Fpdi' => __DIR__ . '/..' . '/setasign/fpdi/src/Fpdi.php',
        'setasign\\Fpdi\\FpdiException' => __DIR__ . '/..' . '/setasign/fpdi/src/FpdiException.php',
        'setasign\\Fpdi\\FpdiTrait' => __DIR__ . '/..' . '/setasign/fpdi/src/FpdiTrait.php',
        'setasign\\Fpdi\\PdfParser\\CrossReference\\AbstractReader' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/CrossReference/AbstractReader.php',
        'setasign\\Fpdi\\PdfParser\\CrossReference\\CrossReference' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/CrossReference/CrossReference.php',
        'setasign\\Fpdi\\PdfParser\\CrossReference\\CrossReferenceException' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/CrossReference/CrossReferenceException.php',
        'setasign\\Fpdi\\PdfParser\\CrossReference\\FixedReader' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/CrossReference/FixedReader.php',
        'setasign\\Fpdi\\PdfParser\\CrossReference\\LineReader' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/CrossReference/LineReader.php',
        'setasign\\Fpdi\\PdfParser\\CrossReference\\ReaderInterface' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/CrossReference/ReaderInterface.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\Ascii85' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/Ascii85.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\Ascii85Exception' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/Ascii85Exception.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\AsciiHex' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/AsciiHex.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\FilterException' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/FilterException.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\FilterInterface' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/FilterInterface.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\Flate' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/Flate.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\FlateException' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/FlateException.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\Lzw' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/Lzw.php',
        'setasign\\Fpdi\\PdfParser\\Filter\\LzwException' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Filter/LzwException.php',
        'setasign\\Fpdi\\PdfParser\\PdfParser' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/PdfParser.php',
        'setasign\\Fpdi\\PdfParser\\PdfParserException' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/PdfParserException.php',
        'setasign\\Fpdi\\PdfParser\\StreamReader' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/StreamReader.php',
        'setasign\\Fpdi\\PdfParser\\Tokenizer' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Tokenizer.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfArray' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfArray.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfBoolean' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfBoolean.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfDictionary' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfDictionary.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfHexString' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfHexString.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfIndirectObject' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfIndirectObject.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfIndirectObjectReference' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfIndirectObjectReference.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfName' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfName.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfNull' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfNull.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfNumeric' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfNumeric.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfStream' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfStream.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfString' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfString.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfToken' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfToken.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfType' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfType.php',
        'setasign\\Fpdi\\PdfParser\\Type\\PdfTypeException' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfParser/Type/PdfTypeException.php',
        'setasign\\Fpdi\\PdfReader\\DataStructure\\Rectangle' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfReader/DataStructure/Rectangle.php',
        'setasign\\Fpdi\\PdfReader\\Page' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfReader/Page.php',
        'setasign\\Fpdi\\PdfReader\\PageBoundaries' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfReader/PageBoundaries.php',
        'setasign\\Fpdi\\PdfReader\\PdfReader' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfReader/PdfReader.php',
        'setasign\\Fpdi\\PdfReader\\PdfReaderException' => __DIR__ . '/..' . '/setasign/fpdi/src/PdfReader/PdfReaderException.php',
        'setasign\\Fpdi\\TcpdfFpdi' => __DIR__ . '/..' . '/setasign/fpdi/src/TcpdfFpdi.php',
        'setasign\\Fpdi\\Tcpdf\\Fpdi' => __DIR__ . '/..' . '/setasign/fpdi/src/Tcpdf/Fpdi.php',
        'setasign\\Fpdi\\Tfpdf\\FpdfTpl' => __DIR__ . '/..' . '/setasign/fpdi/src/Tfpdf/FpdfTpl.php',
        'setasign\\Fpdi\\Tfpdf\\Fpdi' => __DIR__ . '/..' . '/setasign/fpdi/src/Tfpdf/Fpdi.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita874c6664959859850c6e51f6ff4d3b4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita874c6664959859850c6e51f6ff4d3b4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInita874c6664959859850c6e51f6ff4d3b4::$classMap;

        }, null, ClassLoader::class);
    }
}