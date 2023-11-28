# Changelog

All notable changes to this project will be documented in this file, in reverse chronological order by release.

## 2.12.0 - 2022-11-15


-----

### Release Notes for [2.12.0](https://github.com/laminas/laminas-barcode/milestone/10)

Feature release (minor)

### 2.12.0

- Total issues resolved: **0**
- Total pull requests resolved: **1**
- Total contributors: **1**

#### Enhancement

 - [20: Feature: Support PHP 8.2](https://github.com/laminas/laminas-barcode/pull/20) thanks to @ghostwriter

## 2.11.0 - 2022-01-04


-----

### Release Notes for [2.11.0](https://github.com/laminas/laminas-barcode/milestone/8)

### Added

- This release adds support for PHP 8.1.

### Removed

- This release removes support for PHP versions prior to 7.4.

### 2.11.0

- Total issues resolved: **0**
- Total pull requests resolved: **2**
- Total contributors: **2**

#### Documentation,Enhancement

 - [16: Updates sections for installation requirements and deprecations](https://github.com/laminas/laminas-barcode/pull/16) thanks to @froschdesign

#### Enhancement

 - [15: Added PHP8.1 support.](https://github.com/laminas/laminas-barcode/pull/15) thanks to @pelex

## 2.9.1 - TBD

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.9.0 - 2021-02-10


-----

### Release Notes for [2.9.0](https://github.com/laminas/laminas-barcode/milestone/3)

### Added

- Adds support for PHP 8.

### Removed

- Removes support for PHP versions prior to 7.3.0.

- Removes support for laminas/laminas-servicemanager versions prior to 3.6.0.

### 2.9.0

- Total issues resolved: **1**
- Total pull requests resolved: **1**
- Total contributors: **2**

#### Enhancement

 - [10: PHP 8 Support](https://github.com/laminas/laminas-barcode/pull/10) thanks to @weierophinney
 - [9: PHP 8.0 support](https://github.com/laminas/laminas-barcode/issues/9) thanks to @boesing

## 2.8.2 - 2020-03-29

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- Fixed `replace` version constraint in composer.json so repository can be used as replacement of `zendframework/zend-barcode:^2.8.0`.

## 2.8.1 - 2020-01-24

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [#2](https://github.com/laminas/laminas-barcode/pull/2) Fixes php warning about invalid character ignored when setting color as hex code

## 2.8.0 - 2019-12-26

### Added

- [zendframework/zend-barcode#48](https://github.com/zendframework/zend-barcode/pull/48) adds the methods `setProvidedChecksum(bool $value)` (and the option `providedChecksum`) and `getProvidedChecksum()`. These allow indicating that the barcode text includes a checksum value for purposes of validation.

### Changed

- Nothing.

### Deprecated

- [zendframework/zend-barcode#49](https://github.com/zendframework/zend-barcode/pull/49) deprecates `Laminas\Barcode\Renderer\Pdf`. The renderer uses the now-abandoned zendframework/zendpdf package, and, as such, is deprecated as well, and scheduled for removal with version 3.0.0. We will release a separate PDF renderer package at a later date that consumes a 3rd party PDF library.

### Removed

- Nothing.

### Fixed

- Nothing.

## 2.7.1 - 2019-09-21

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-barcode#43](https://github.com/zendframework/zend-barcode/pull/43) fixes typo in exception message of `Laminas\Barcode\Exception\UnexpectedValueException`.

- [zendframework/zend-barcode#44](https://github.com/zendframework/zend-barcode/pull/44) changes
  curly braces in array and string offset access to square brackets
  in order to prevent issues under the upcoming PHP 7.4 release.

- [zendframework/zend-barcode#45](https://github.com/zendframework/zend-barcode/pull/45) fixes
  rotation calculations.

- [zendframework/zend-barcode#46](https://github.com/zendframework/zend-barcode/pull/46) fixes
  generating checksum for EAN5 and Identcode/Leitcode. These barcodes
  have fixed length and checksum generator must use also leading zeros.

- [zendframework/zend-barcode#47](https://github.com/zendframework/zend-barcode/pull/47) fixes
  text length for EAN2 and EAN5 by adding leading zeros.

## 2.7.0 - 2017-12-11

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- [zendframework/zend-barcode#25](https://github.com/zendframework/zend-barcode/pull/25) removes support
  for PHP 5.5.

- [zendframework/zend-barcode#38](https://github.com/zendframework/zend-barcode/pull/38) removes support
  for HHVM.

### Fixed

- Nothing.

## 2.6.1 - 2017-12-11

### Added

- Nothing.

### Changed

- Nothing.

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-barcode#24](https://github.com/zendframework/zend-barcode/pull/24) updates the SVG
  renderer to remove extraneous whitespace in `rgb()` declarations, as the
  specification dis-allows whitespace, and many PDF readers/manipulators will
  not correctly consume SVG definitions that include them.

- [zendframework/zend-barcode#36](https://github.com/zendframework/zend-barcode/pull/36) provides several
  minor changes to namespace imports for the `Laminas\Barcode\Object` namespace to
  ensure the package works on PHP 7.2.

## 2.6.0 - 2016-02-17

### Added

- [zendframework/zend-barcode#23](https://github.com/zendframework/zend-barcode/pull/23) prepares and
  publishes the documentation to https://docs.laminas.dev/laminas-barcode/

### Deprecated

- Nothing.

### Removed

- Nothing.

### Fixed

- [zendframework/zend-barcode#12](https://github.com/zendframework/zend-barcode/pull/12) and
  [zendframework/zend-barcode#16](https://github.com/zendframework/zend-barcode/pull/16) update the code
  base to be forwards-compatible with laminas-servicemanager and laminas-stdlib v3.
