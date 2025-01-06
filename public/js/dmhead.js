//Vue.config.devtools = true;
var app = new Vue(
  {
    el: '#head',
    data: {
        message: '',
        current_result: [],
        score_total: "",
        judge1: 0,
        judge2: 0,
        judge3: 0,
        judge4: 0,
        judge5: 0,
        judge6: 0,
        judge7: 0,
        blue_point: 0,
        red_point: 10,
        judgenum: 5,
        type: '',
        dnstype: '',
        status: '',
        class: '',
    },
    methods: {
        culculate_point: function() {
            this.judge1 = parseInt(this.current_result.judge1);
            this.judge2 = parseInt(this.current_result.judge2);
            this.judge3 = parseInt(this.current_result.judge3);
            this.judge4 = parseInt(this.current_result.judge4);
            this.judge5 = parseInt(this.current_result.judge5);
            this.judge6 = parseInt(this.current_result.judge6);
            this.judge7 = parseInt(this.current_result.judge7);
                        
            this.blue_point = 
            Number(this.current_result.judge1)+
            Number(this.current_result.judge2)+
            Number(this.current_result.judge3)+
            Number(this.current_result.judge4)+
            Number(this.current_result.judge5)+
            Number(this.current_result.judge6)+
            Number(this.current_result.judge7);
            this.red_point = 
            Number(this.current_result.judgenum)*5-
            Number(this.blue_point);
        },
    
        //現在の選択選手読み込み
        getCurrentRaceInfo: function() {
            /*common用のapp.blade.phpへ出力*/
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
                            _self.message = "更新に失敗しました。"+err.responseJSON.message;
                        }
                    });
                },
                error: function(err) {
                    console.log("onConfirm NG "+ err.responseJSON.message);
                    _self.message = "更新に失敗しました。"+err.responseJSON.message;
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
            this.dnstype = type.substr(-3);
            _self = this;
            $.ajax({
                type: 'post',
                url: "/currentdmresult/setStatus",
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
                    _self.culculate_point();
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
                    console.log("getCurrentResult NG "+ err.responseJSON.message);
                    _self.message = "更新に失敗しました。"+err.responseJSON.message;
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
            appcommon.getCurrentRacer();
        },
        getCurrentResult: function() {
            _self = this;
            $.ajax({
                type: 'get',
                url: "/currentdmresult/getcurrent",
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("getCurrentResult OK");
                    _self.current_result = result;
                    _self.culculate_point();
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
}
)
  