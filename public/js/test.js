  
const DATA = [
    ]
      

var app = new Vue(
    {
        el: '#test',
        data: {
            message: '',
            sex: 'F',
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
            racekind: 'Q',
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
                this.start = this.selected[0].通番;
                this.bib = this.selected[0].BIB;
                this.sajno = this.selected[0].SAJNO;
                this.name = this.selected[0].氏名漢;
                this.pref = this.selected[0].県連盟;
                this.team = this.selected[0].所属;
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
                        _self.message = "次の選手に更新しました。";
                        _self.status = 'success'
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    },
                    error: function(err) {
                        console.log(err);
                        _self.status = 'failed'
                        _self.message = "カレントテーブルの更新に失敗しました。"+err.massege;
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    }
                });
            },
            //取得
            onGetStart: function(e) {
                console.log("onGetStart");
                //apiで登録（とりあえずカレントテーブルに登録→ターンジャッジテーブルに登録するのは後日）
                _self = this;
                $.ajax({
                    type: 'get',
                    url: "/getStart",
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
                        _self.items = result;
                        _self.message = "リストの取得に成功しました。";
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                            },
                    error: function(err) {
                        console.log(err);
                        _self.message = "取得に失敗しました。"+err.massege;
                        _self.$nextTick(function(){
                            setTimeout(function(){_self.message = "";}, 3000);
                        });
                    }
                });
            },

        },
        created() {
            this.items = DATA
        },
    }
)
