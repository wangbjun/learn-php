var vm = new Vue({
  el:"#app",
  data: {
    apiProductList:'./data/cartData.json',
    totalMoney: 0,
    productList: [],
    checkAllFlag: false,
    delFlag: false,
    curProduct: '',
  },
  filters: {
    formatMoney: function (value) {
      return '¥'+value.toFixed(2);
    }
  },
  mounted: function () {
    this.cartView();
  },
  computed: {
    totalMoneyCount: function () {
      let _this = this;
      _this.totalMoney = 0;
      this.productList.forEach(function (value, key) {
        if(value.checked) {
          _this.totalMoney += value.productQuentity * value.productPrice;
        }
      });
      return _this.totalMoney;
    }
  },
  methods: {
    cartView: function () {
      axios.post(this.apiProductList, {id: 5})
        .then(response=>{
          this.productList = response.data.result.list;
        })
    },
    changeMoney: function (product, type) {
      if (type > 0) {
        product.productQuentity++;
      }else if(type === 0){
        let input = document.getElementById('inputQuentity');
        console.log(input);
      }else{
        product.productQuentity--;
        if (product.productQuentity <= 0) {
          product.productQuentity = 1;
        }
      }
    },
    selectedProduct: function (item) {
      let checkAllFlag = true;
      if (typeof item.checked === 'undefined') {
        this.$set(item, 'checked', true);
      }else {
        item.checked = !item.checked;
      }
      this.productList.forEach(function(item,index){
        checkAllFlag = checkAllFlag && item.checked;
      });
      this.checkAllFlag = checkAllFlag;
    },
    checkAll: function (flag) {
      this.checkAllFlag = flag;
      let _this = this;
      this.productList.forEach(function (value, key) {
        if (typeof value.checked === 'undefined') {
          _this.$set(value, 'checked', _this.checkAllFlag);
        }else {
          value.checked = _this.checkAllFlag;
        }
      })
    },
    delConfirm: function (item, key) {
      this.delFlag = true;
      this.curProduct = item.id;
      this.curProductKey = key;
    },
    delProduct: function () {
      this.productList.splice(this.curProductKey, 1);
      this.delFlag = false;
    }
  }
});