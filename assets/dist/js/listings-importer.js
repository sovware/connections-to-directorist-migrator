/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./assets/src/js/admin/listings-importer.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./assets/src/js/admin/admin-main.js":
/*!*******************************************!*\
  !*** ./assets/src/js/admin/admin-main.js ***!
  \*******************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _scss_admin_admin_style_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./../../scss/admin/admin-style.scss */ "./assets/src/scss/admin/admin-style.scss");
/* harmony import */ var _scss_admin_admin_style_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_scss_admin_admin_style_scss__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _global_global_main__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./../global/global-main */ "./assets/src/js/global/global-main.js");
// CSS
 // JS



/***/ }),

/***/ "./assets/src/js/admin/listings-importer.js":
/*!**************************************************!*\
  !*** ./assets/src/js/admin/listings-importer.js ***!
  \**************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _scss_admin_listings_importer_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./../../scss/admin/listings-importer.scss */ "./assets/src/scss/admin/listings-importer.scss");
/* harmony import */ var _scss_admin_listings_importer_scss__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_scss_admin_listings_importer_scss__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _admin_main__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./admin-main */ "./assets/src/js/admin/admin-main.js");

// CSS
 // JS


document.addEventListener('DOMContentLoaded', init, false);
var $ = jQuery;

function Tasks() {
  return {
    init: function init() {
      this.handleListingsImportSourceNavLink();
    },
    handleListingsImportSourceNavLink: function handleListingsImportSourceNavLink() {
      var listingsImportSourceNavLinks = document.querySelectorAll('.directorist-listings-import-nav-link');

      if (!listingsImportSourceNavLinks) {
        return;
      }

      _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(listingsImportSourceNavLinks).forEach(function (item) {
        item.addEventListener('click', function () {
          var query_var_value = this.getAttribute('data-query-var-value'); // Upldate Listing import source type

          var listing_import_source_type = document.querySelector('.listing-import-source-type');

          if (listing_import_source_type) {
            listing_import_source_type.setAttribute('value', query_var_value);
          } // Update File Upload Required Status


          var file_upload_field = document.querySelector('#upload');

          if (file_upload_field) {
            if ('other' === query_var_value) {
              file_upload_field.removeAttribute('required');
            } else {
              file_upload_field.setAttribute('required', true);
            }
          } // Update Listings Import Sources Required Status
          // const listings_import_sources = document.querySelector( '.directorist-listings-import-source' );
          // const listings_import_sources = document.querySelector( '.directorist-listings-import-source' );
          // const listings_import_sources = $( '.directorist-listings-import-sources' );
          // console.log( 'log', { listings_import_sources } );
          // if ( listings_import_sources ) {
          //     if ( 'other' === query_var_value ) {
          //         listings_import_sources.setAttr( 'required' ).trigger("change");
          //         // listings_import_sources.setAttribute( 'required' );
          //     } else {
          //         // listings_import_sources.removeAttribute( 'required', true );
          //         listings_import_sources.removeAttr( 'required' ).trigger("change");
          //     }
          // }

        });
      });
    }
  };
}

function init() {
  var tasks = new Tasks();
  tasks.init();
}

/***/ }),

/***/ "./assets/src/js/global/components/tabs.js":
/*!*************************************************!*\
  !*** ./assets/src/js/global/components/tabs.js ***!
  \*************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/helpers/toConsumableArray */ "./node_modules/@babel/runtime/helpers/toConsumableArray.js");
/* harmony import */ var _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0__);

document.addEventListener('DOMContentLoaded', init, false);

function Tasks() {
  return {
    init: function init() {
      this.initToggleTabLinks();
    },
    initToggleTabLinks: function initToggleTabLinks() {
      var links = document.querySelectorAll('.directorist-toggle-tab');

      if (!links) {
        return;
      }

      var self = this;

      _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(links).forEach(function (item) {
        item.addEventListener('click', function (event) {
          self.handleToggleTabLinksEvent(item, event);
        });
      });
    },
    handleToggleTabLinksEvent: function handleToggleTabLinksEvent(item, event) {
      event.preventDefault();
      var navContainerClass = item.getAttribute('data-nav-container');
      var tabContainerClass = item.getAttribute('data-tab-container');
      var tabClass = item.getAttribute('data-tab');

      if (!navContainerClass || !tabContainerClass || !tabClass) {
        return;
      }

      var navContainer = item.closest('.' + navContainerClass);
      var tabContainer = document.querySelector('.' + tabContainerClass);

      if (!navContainer || !tabContainer) {
        return;
      }

      var tab = tabContainer.querySelector('.' + tabClass);

      if (!tab) {
        return;
      } // Remove Active Class


      var removeActiveClass = function removeActiveClass(item) {
        item.classList.remove('--is-active');
      }; // Toggle Nav


      var activeNavItems = navContainer.querySelectorAll('.--is-active');

      if (activeNavItems) {
        _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(activeNavItems).forEach(removeActiveClass);
      }

      item.classList.add('--is-active'); // Toggle Tab

      var activeTabItems = tabContainer.querySelectorAll('.--is-active');

      if (activeTabItems) {
        _babel_runtime_helpers_toConsumableArray__WEBPACK_IMPORTED_MODULE_0___default()(activeTabItems).forEach(removeActiveClass);
      }

      tab.classList.add('--is-active'); // Update Query Var

      var queryVarKey = item.getAttribute('data-query-var-key');
      var queryVarValue = item.getAttribute('data-query-var-value');

      if (!queryVarKey || !queryVarValue) {
        return;
      }

      this.addQueryParam(queryVarKey, queryVarValue);
    },
    addQueryParam: function addQueryParam(key, value) {
      var url = new URL(window.location.href);
      url.searchParams.set(key, value);
      window.history.pushState({}, '', url.toString());
    }
  };
}

function init() {
  var tasks = new Tasks();
  tasks.init();
}

/***/ }),

/***/ "./assets/src/js/global/global-main.js":
/*!*********************************************!*\
  !*** ./assets/src/js/global/global-main.js ***!
  \*********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_tabs__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/tabs */ "./assets/src/js/global/components/tabs.js");
// JS


/***/ }),

/***/ "./assets/src/scss/admin/admin-style.scss":
/*!************************************************!*\
  !*** ./assets/src/scss/admin/admin-style.scss ***!
  \************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./assets/src/scss/admin/listings-importer.scss":
/*!******************************************************!*\
  !*** ./assets/src/scss/admin/listings-importer.scss ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js":
/*!*****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayLikeToArray.js ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _arrayLikeToArray(arr, len) {
  if (len == null || len > arr.length) len = arr.length;

  for (var i = 0, arr2 = new Array(len); i < len; i++) {
    arr2[i] = arr[i];
  }

  return arr2;
}

module.exports = _arrayLikeToArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _arrayWithoutHoles(arr) {
  if (Array.isArray(arr)) return arrayLikeToArray(arr);
}

module.exports = _arrayWithoutHoles, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/iterableToArray.js":
/*!****************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/iterableToArray.js ***!
  \****************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _iterableToArray(iter) {
  if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter);
}

module.exports = _iterableToArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/nonIterableSpread.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _nonIterableSpread() {
  throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.");
}

module.exports = _nonIterableSpread, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/toConsumableArray.js":
/*!******************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/toConsumableArray.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayWithoutHoles = __webpack_require__(/*! ./arrayWithoutHoles.js */ "./node_modules/@babel/runtime/helpers/arrayWithoutHoles.js");

var iterableToArray = __webpack_require__(/*! ./iterableToArray.js */ "./node_modules/@babel/runtime/helpers/iterableToArray.js");

var unsupportedIterableToArray = __webpack_require__(/*! ./unsupportedIterableToArray.js */ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js");

var nonIterableSpread = __webpack_require__(/*! ./nonIterableSpread.js */ "./node_modules/@babel/runtime/helpers/nonIterableSpread.js");

function _toConsumableArray(arr) {
  return arrayWithoutHoles(arr) || iterableToArray(arr) || unsupportedIterableToArray(arr) || nonIterableSpread();
}

module.exports = _toConsumableArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ }),

/***/ "./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js":
/*!***************************************************************************!*\
  !*** ./node_modules/@babel/runtime/helpers/unsupportedIterableToArray.js ***!
  \***************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var arrayLikeToArray = __webpack_require__(/*! ./arrayLikeToArray.js */ "./node_modules/@babel/runtime/helpers/arrayLikeToArray.js");

function _unsupportedIterableToArray(o, minLen) {
  if (!o) return;
  if (typeof o === "string") return arrayLikeToArray(o, minLen);
  var n = Object.prototype.toString.call(o).slice(8, -1);
  if (n === "Object" && o.constructor) n = o.constructor.name;
  if (n === "Map" || n === "Set") return Array.from(o);
  if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return arrayLikeToArray(o, minLen);
}

module.exports = _unsupportedIterableToArray, module.exports.__esModule = true, module.exports["default"] = module.exports;

/***/ })

/******/ });
//# sourceMappingURL=listings-importer.js.map