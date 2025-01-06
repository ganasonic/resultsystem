  
const DATA = [
    ]
      

var app = new Vue(
    {
        el: '#resultlist',
        data: {
            message: '',
            sex: '',
            class: '',
            src_class: '',
            dst_class: '',
            season: '',
            codex: '',
            items: null,
            selected: [],
            start: '',
            bib: '',
            name: '',
            pref: '',
            team: '',
            racekind: '',
            status: '',
            url: '',
        },
        methods: {
            onRowSelected(items) {
                this.status = 'selected'
            },
            //勝ち上がりスタートリスト作成
            onCreateStartList: function(classtiyp) {
                console.log("onCreateStartList");
                _self = this;
                _self.racekind = document.getElementById("valueClass").value;
                _self.sex = document.getElementById("valueSex").value;
        //予選2作成
                if(classtiyp=="Q2"){
                    _self.url= "/createFinal1StartList";
                    _self.dst_class = "Q2";
                }
                //決勝１作成
                else if(classtiyp=="F1"){
                    _self.url= "/createFinal1StartList";
                    _self.dst_class = "F1";
                }
                //決勝2作成
                else if(classtiyp=="F1"){
                    _self.url= "/createFinal2StartList";
                    _self.dst_class = "F2";
                }
                $.ajax({
                    type: 'get',
                    url: _self.url,
                    data: {
                        sex: _self.sex,
                        season:_self.season,
                        src_class: _self.racekind,
                        dst_class: _self.dst_class,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (typeof (result.error_code) !== 'undefined') {
                            console.log(result.error_code + ':' + result.massege);
                            return;
                        }
                        console.log("ononCreateStartList OK");
                        _self.message = "スタートリストの作成に成功しました。";
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                            },
                    error: function(err) {
                        console.log("ononCreateStartList NG "+ err.responseJSON.message);
                        _self.message = "スタートリストの作成に失敗しました。"+err.responseJSON.message;
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    }
                });
            },
            //取得
            onGetResult: function() {
                console.log("onGetResult");
                //apiで登録（とりあえずカレントテーブルに登録→ターンジャッジテーブルに登録するのは後日）
                _self = this;
                _self.sex = document.getElementById("valueSex").value;
                _self.racekind = document.getElementById("valueClass").value;
                $.ajax({
                    type: 'get',
                    url: "/getresult",
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
                        console.log("onGetResult OK");
                        _self.items = result;
                        _self.message = "リストの取得に成功しました。";
                        //ヘッダに表示
                        appcommon.sex = _self.sex;
                        appcommon.classname = _self.racekind;
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                            },
                    error: function(err) {
                        console.log("onGetResult NG "+ err.responseJSON.message);
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
                //_self.onGetResult();
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
