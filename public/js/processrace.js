  
const DATA = [
    ]
      

var app = new Vue(
    {
        el: '#processrace',
        data: {
            message: '',
            sex: '',
            class: '',
            season: '2022',
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
        },
        methods: {
            onRowSelected(items) {
                this.status = 'selected'
                this.selected = items;
                this.sex = this.selected[0].sex;
                //this.class = this.selected[0].class;
                this.season = this.selected[0].season;
                this.codex = this.selected[0].codex;
                this.start = this.selected[0].start;
                this.bib = this.selected[0].BIB;
                this.sajno = this.selected[0].SAJNO;
                this.name = this.selected[0].氏名漢;
                this.pref = this.selected[0].県連盟;
                this.team = this.selected[0].所属;

                localStorage.setItem("season", this.season);

                this.onUpdate();
            },
            //選択＆更新
            onUpdate: function() {
                console.log("onUpdate");
                _self = this;
                $.ajax({
                    type: 'get',
                    url: "/currentresult/update",
                    data: {
                        sex: _self.sex,
                        class: _self.racekind,
                        season: _self.season,
                        codex: _self.codex,
                        sajno: _self.sajno,
                        start: _self.start,
                        bib: _self.bib,
                        name: _self.name,
                        pref: _self.pref,
                        team: _self.team,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (typeof (result.error_code) !== 'undefined') {
                            console.log(result.error_code + ':' + result.massege);
                            return;
                        }
                        console.log("onUpdate OK");
                        //_self.message = "次の選手に更新しました。";
                        _self.status = 'success';
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 500);
                            /*ヘッダに表示*/
                            appcommon.getCurrentRacer();
                        });
                    },
                    error: function(err) {
                        console.log("onUpdate NG "+ err.responseJSON.message);
                        _self.status = 'failed';
                        _self.message = "カレントテーブルの更新に失敗しました。"+err.responseJSON.message;
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    }
                });
            },
            //取得
            onGetStart: function() {
                console.log("onGetStart");
                //apiで登録（とりあえずカレントテーブルに登録→ターンジャッジテーブルに登録するのは後日）
                _self = this;
                _self.sex = document.getElementById("valueSex").value;
                _self.racekind = document.getElementById("valueClass").value;
                $.ajax({
                    type: 'get',
                    url: "/getStart",
                    data: {
                        sex: _self.sex,
                        season: _self.season,
                        class: _self.racekind,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (typeof (result.error_code) !== 'undefined') {
                            console.log(result.error_code + ':' + result.massege);
                            return;
                        }
                        console.log("onGetStart OK");
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
            this.$nextTick(function () {
                // ビュー全体がレンダリングされた後にのみ実行されるコード
                console.log("nextTick");
                _self.onGetStart();
                /*common用のapp.blade.phpへ出力*/
                //appcommon.getCurrentRacer();
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
