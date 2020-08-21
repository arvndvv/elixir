"use strict";

function _instanceof(left, right) { if (right != null && typeof Symbol !== "undefined" && right[Symbol.hasInstance]) { return !!right[Symbol.hasInstance](left); } else { return left instanceof right; } }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!_instanceof(instance, Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

function _createSuper(Derived) { return function () { var Super = _getPrototypeOf(Derived), result; if (_isNativeReflectConstruct()) { var NewTarget = _getPrototypeOf(this).constructor; result = Reflect.construct(Super, arguments, NewTarget); } else { result = Super.apply(this, arguments); } return _possibleConstructorReturn(this, result); }; }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _isNativeReflectConstruct() { if (typeof Reflect === "undefined" || !Reflect.construct) return false; if (Reflect.construct.sham) return false; if (typeof Proxy === "function") return true; try { Date.prototype.toString.call(Reflect.construct(Date, [], function () {})); return true; } catch (e) { return false; } }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

var ImgUpload = function ImgUpload(_ref) {
  var onChange = _ref.onChange,
      src = _ref.src;
  return /*#__PURE__*/React.createElement("label", {
    htmlFor: "photo-upload",
    className: "custom-file-upload fas"
  }, /*#__PURE__*/React.createElement("div", {
    className: "img-wrap img-upload"
  }, /*#__PURE__*/React.createElement("img", {
    for: "photo-upload",
    src: src
  })), /*#__PURE__*/React.createElement("input", {
    id: "photo-upload",
    type: "file",
    onChange: onChange
  }));
};

var Name = function Name(_ref2) {
  var onChange = _ref2.onChange,
      value = _ref2.value;
  return /*#__PURE__*/React.createElement("div", {
    className: "field"
  }, /*#__PURE__*/React.createElement("label", {
    htmlFor: "name"
  }, "name:"), /*#__PURE__*/React.createElement("input", {
    id: "name",
    type: "text",
    onChange: onChange,
    maxlength: "25",
    value: value,
    placeholder: "Alexa",
    required: true
  }));
};

var Status = function Status(_ref3) {
  var onChange = _ref3.onChange,
      value = _ref3.value;
  return /*#__PURE__*/React.createElement("div", {
    className: "field"
  }, /*#__PURE__*/React.createElement("label", {
    htmlFor: "status"
  }, "status:"), /*#__PURE__*/React.createElement("input", {
    id: "status",
    type: "text",
    onChange: onChange,
    maxLength: "35",
    value: value,
    placeholder: "It's a nice day!",
    required: true
  }));
};

var Profile = function Profile(_ref4) {
  var onSubmit = _ref4.onSubmit,
      src = _ref4.src,
      name = _ref4.name,
      status = _ref4.status;
  return /*#__PURE__*/React.createElement("div", {
    className: "card"
  }, /*#__PURE__*/React.createElement("form", {
    onSubmit: onSubmit
  }, /*#__PURE__*/React.createElement("h1", null, "Profile Card"), /*#__PURE__*/React.createElement("label", {
    className: "custom-file-upload fas"
  }, /*#__PURE__*/React.createElement("div", {
    className: "img-wrap"
  }, /*#__PURE__*/React.createElement("img", {
    for: "photo-upload",
    src: src
  }))), /*#__PURE__*/React.createElement("div", {
    className: "name"
  }, name), /*#__PURE__*/React.createElement("div", {
    className: "status"
  }, status), /*#__PURE__*/React.createElement("button", {
    type: "submit",
    className: "edit"
  }, "Edit Profile ")));
};

var Edit = function Edit(_ref5) {
  var onSubmit = _ref5.onSubmit,
      children = _ref5.children;
  return /*#__PURE__*/React.createElement("div", {
    className: "card"
  }, /*#__PURE__*/React.createElement("form", {
    onSubmit: onSubmit
  }, /*#__PURE__*/React.createElement("h1", null, "Profile Card"), children, /*#__PURE__*/React.createElement("button", {
    type: "submit",
    className: "save"
  }, "Save ")));
};

var CardProfile = /*#__PURE__*/function (_React$Component) {
  _inherits(CardProfile, _React$Component);

  var _super = _createSuper(CardProfile);

  function CardProfile() {
    var _this;

    _classCallCheck(this, CardProfile);

    for (var _len = arguments.length, args = new Array(_len), _key = 0; _key < _len; _key++) {
      args[_key] = arguments[_key];
    }

    _this = _super.call.apply(_super, [this].concat(args));

    _defineProperty(_assertThisInitialized(_this), "state", {
      file: '',
      imagePreviewUrl: 'https://github.com/OlgaKoplik/CodePen/blob/master/profile.jpg?raw=true',
      name: '',
      status: '',
      active: 'edit'
    });

    _defineProperty(_assertThisInitialized(_this), "photoUpload", function (e) {
      e.preventDefault();
      var reader = new FileReader();
      var file = e.target.files[0];

      reader.onloadend = function () {
        _this.setState({
          file: file,
          imagePreviewUrl: reader.result
        });
      };

      reader.readAsDataURL(file);
    });

    _defineProperty(_assertThisInitialized(_this), "editName", function (e) {
      var name = e.target.value;

      _this.setState({
        name: name
      });
    });

    _defineProperty(_assertThisInitialized(_this), "editStatus", function (e) {
      var status = e.target.value;

      _this.setState({
        status: status
      });
    });

    _defineProperty(_assertThisInitialized(_this), "handleSubmit", function (e) {
      e.preventDefault();
      var activeP = _this.state.active === 'edit' ? 'profile' : 'edit';

      _this.setState({
        active: activeP
      });
    });

    return _this;
  }

  _createClass(CardProfile, [{
    key: "render",
    value: function render() {
      var _this$state = this.state,
          imagePreviewUrl = _this$state.imagePreviewUrl,
          name = _this$state.name,
          status = _this$state.status,
          active = _this$state.active;
      return /*#__PURE__*/React.createElement("div", null, active === 'edit' ? /*#__PURE__*/React.createElement(Edit, {
        onSubmit: this.handleSubmit
      }, /*#__PURE__*/React.createElement(ImgUpload, {
        onChange: this.photoUpload,
        src: imagePreviewUrl
      }), /*#__PURE__*/React.createElement(Name, {
        onChange: this.editName,
        value: name
      }), /*#__PURE__*/React.createElement(Status, {
        onChange: this.editStatus,
        value: status
      })) : /*#__PURE__*/React.createElement(Profile, {
        onSubmit: this.handleSubmit,
        src: imagePreviewUrl,
        name: name,
        status: status
      }));
    }
  }]);

  return CardProfile;
}(React.Component);

ReactDOM.render( /*#__PURE__*/React.createElement(CardProfile, null), document.getElementById('root'));