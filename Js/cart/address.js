var vm = new Vue({
  el:"#app",
  data: {
    apiProductList:'./data/address.json',
    addressList: [],
    limitNum: 3,
    currentIndex: 0,
    shippingMethod: 1,
  },
  filters: {

  },
  mounted: function () {
    this.getAddressList();
  },
  computed: {
    addressListFilter: function () {
      return this.addressList.slice(0, this.limitNum);
    }
  },
  methods: {
    getAddressList: function () {
      axios.post(this.apiProductList, {id: 5})
        .then(response=>{
          this.addressList = response.data.result;
        })
    },
    setDefault: function (item, key) {
      this.addressList.forEach(function (value,index) {
        value.isDefault = false;
        if (value.addressId === item.addressId) {
          value.isDefault = true;
        }
      });
    },
    delAddress: function (item, key) {
      this.addressList.splice(key, 1);
    }
  }
});