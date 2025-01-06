  
const DATA = [
    ]
      

var app = new Vue(
    {
        el: '#startlist',
        data: {
            message: '',
            sex: '',
            class: '',
            season: '',
            codex: '',
            racerlists: null,
            dnslists: null,
            selected: [],
            racekind: '',
            status: '',
        },
        methods: {
            onRowSelected(items) {
                this.status = 'selected'
            },
            //取得
            onDrawList: function() {
                console.log("onDrawList");
                _self = this;
                _self.sex = document.getElementById("valueSex").value;
                _self.racekind = document.getElementById("valueClass").value;
                $.ajax({
                    type: 'get',
                    url: "/setdraw",
                    data: {
                        sex: _self.sex,
                        class: _self.racekind,
                        season:_self.season,
                        codex:_self.codex,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (typeof (result.error_code) !== 'undefined') {
                            console.log(result.error_code + ':' + result.massege);
                            return;
                        }
                        console.log("onDrawList OK");
                        _self.racerlists = result[0];
                        _self.dnslists = result[1];
                        _self.message = "リストの取得に成功しました。";
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    },
                    error: function(err) {
                        console.log("onDrawList NG "+ err.responseJSON.message);
                        _self.message = "取得に失敗しました。"+err.responseJSON.message;
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    }
                });
            },
            onGetStart: function() {
                console.log("onGetStart");
                _self = this;
                _self.sex = document.getElementById("valueSex").value;
                _self.racekind = document.getElementById("valueClass").value;
                $.ajax({
                    type: 'get',
                    url: "/startlist",
                    data: {
                        sex: _self.sex,
                        season:_self.season,
                        codex:_self.codex,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (typeof (result.error_code) !== 'undefined') {
                            console.log(result.error_code + ':' + result.massege);
                            return;
                        }
                        console.log("onGetStart OK");
                        _self.racerlists = result[0];
                        _self.dnslists = result[1];
                        _self.message = "リストの取得に成功しました。";
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    },
                    error: function(err) {
                        console.log("onGetStart NG "+ err.responseJSON.message);
                        _self.message = "取得に失敗しました。"+err.responseJSON.message;
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    }
                });
            },
        },
        mounted() {
            _self = this;
            console.log("mounted");
            _self.season = localStorage.getItem("season");
            this.$nextTick(function () {
                // ビュー全体がレンダリングされた後にのみ実行されるコード
                console.log("nextTick");
                _self.onGetStart();
            })
            },
        beforeMount() {
            console.log("beforeMount");
        },
        beforeUpdate() {
            console.log("beforeUpdate");
        },
        updated() {
            console.log("updated");
        },
        beforeCreate() {
            console.log("beforeCreate");
        },
        created() {
            console.log("created");
        },
        }
)
