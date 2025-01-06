//Vue.config.devtools = true;
var app = new Vue(
  {
    el: '#head',
    data: {
        message: '',
        current_result: [],
        score_total: "",
        time_point: 0.0,
        time_temp: 0.0,
        temp: 0.0,
        scale: 1,
        type: '',
        status: '',
        class: '',
    },
    methods: {
        //現在の選択選手読み込み
        getCurrentRaceInfo: function() {
            /*common用のapp.blade.phpへ出力*/
            appcommon.getCurrentPacetime();
            appcommon.getCurrentRacer();
        },

        onConfirm: function() {
            console.log("onConfirm clicked");
            _self = this;
            $.ajax({
                type: 'post',
                url: "/result/insert",
                url: "/currentresult/postcurrent",
                data: {
                    air_code1: _self.current_result.air11,
                    air_code2: _self.current_result.air12,
                },
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("onConfirm OK");
                    _self.message = "スコアを確定しました。";
                    _self.current_result = result;/*スコアをクリアしたデータ*/
                    $.ajax({
                        type: 'post',
                        url: "/result/insert",
                        dataType: 'json',
                        success: function(result) {
                            if (typeof (result.error_code) !== 'undefined') {
                                console.log(result.error_code + ':' + result.massege);
                                return;
                            }
                            console.log("onConfirm OK");
                            _self.message = "リザルトリストに追加しました。";
                            _self.current_result = result;/*スコアをクリアしたデータ*/
                            _self.setNextRacer();
                            _self.$nextTick(function(){
                              setTimeout(function(){
                                  _self.message = "";
                                  _self.getCurrentRaceInfo();
                              }, 3000);
                          });
                        },
                        error: function(err) {
                            console.log("onConfirm NG "+ err.responseJSON.message);
                            _self.message = "更新に失敗しました。"+err.massege;
                        }
                    });
                },
                error: function(err) {
                    console.log("onConfirm NG "+ err.responseJSON.message);
                    _self.message = "更新に失敗しました。"+err.massege;
                  }
            });
        },
        setNextRacer: function() {
            console.log("setNextRacer");
            _self = this;
            $.ajax({
                type: 'get',
                url: "/currentresult/getNextRacer",
                data: {},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("setNextRacer OK");
                    //_self.current_result = result;
                    //_self.setCurrentRacer(result);
                },
                error: function(err) {
                    console.log("setNextRacer NG "+ err.message);
                    _self.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _self.status = 'failed';
                    _self.$nextTick(function(){
                        //setTimeout(function(){_self.message = "";}, 3000);
                    });
                }
            });
        },

        onReload: function() {
            console.log("onLoaded");
            this.status = 'selected';
            this.message = "";
            this.getCurrentResult()
        },
        onSetStatus: function(type) {
            console.log("onSetDns");
            //apiで登録
            this.type = type;
            _self = this;
            $.ajax({
                type: 'post',
                url: "/currentresult/setStatus",
                data: {
                    type: _self.type,
                    status:"enable"
                },
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("getCurrentResult OK");
                    _self.current_result = result;
                    if(_self.type==""){
                        _self.message = "リセットしました。";
                    }else{
                        _self.message = _self.type +"を更新しました。";
                    }
                    _self.$nextTick(function(){
                        setTimeout(function(){_self.message = "";}, 3000);
                        setTimeout(function(){_self.getCurrentResult();}, 1000);
                    });
                },
                error: function(err) {
                    console.log("getCurrentResult NG "+ err.message);
                    _self.message = "更新に失敗しました。"+err.massege;
                    _self.$nextTick(function(){
                        setTimeout(function(){_self.message = "";}, 3000);
                    });
                }
            });
            //this.current_result.score = "DNS"
        },
        onReset: function() {
            console.log("onReset");
            this.current_result.score = ""
        },
        getCurrentRaceInfo: function() {
            /*common用のapp.blade.phpへ出力*/
            appcommon.getCurrentPacetime();
            appcommon.getCurrentRacer();
            /*common用のapp.blade.phpへ出力*/
            /*
            appcommon.classname = _self.current_result.class;
            appcommon.sex = _self.current_result.sex;
            appcommon.season = _self.current_result.season;
            appcommon.codex = _self.current_result.codex;
            appcommon.start = _self.current_result.start;
            appcommon.bib = _self.current_result.bib;
            appcommon.name = _self.current_result.name;
            appcommon.pref = _self.current_result.pref;
            appcommon.team = _self.current_result.team;
            */
        },
        getCurrentResult: function() {
            _self = this;
            $.ajax({
                type: 'get',
                url: "/currentresult/getcurrent"/*"baseData.url.reload"*/,
                data: {limit: 9999, offset: 0},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("getCurrentResult OK");
                    _self.current_result = result;
                    _self.$nextTick(function(){
                        setTimeout(function(){_self.getCurrentResult();}, 1000);
                    });
                },
                error: function(err) {
                    console.log("getCurrentResult NG "+ err.message);
                    _self.message = "情報の取得に失敗しました。start/reloadボタンを押してください。";
                    _self.status = 'failed';
                    _self.$nextTick(function(){
                        //setTimeout(function(){_self.message = "";}, 3000);
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
            _self.getCurrentRaceInfo();
        })
    },
    /*
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
    */
}
)
  