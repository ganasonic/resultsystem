//Vue.config.devtools = true;
var app = new Vue(
  {
    el: '#time',
    data: {
        message: '',
        base_point: 0,
        time_second: 20.0,
        time_millisecond: 0.0,
        time_paceset: 0.0,
        time_point: 20.0,
        time_temp: 0.0,
        temp: 0.0,
        scale: 1,
        status: '',
    },
    methods: {
        culculate_time: function() {
            this.base_point = this.base_point * 100 // 100 で乗算
            this.base_point = Math.round(this.base_point) // 四捨五入
            this.base_point = this.base_point / 100 // 100 で除算
            this.base_point = this.base_point.toFixed(2)
            //タイムポイント計算式
            this.time_point = 48 - 32 * Number(this.base_point) / Number(this.time_paceset)
            this.time_point = this.time_point * 100 // 100 で乗算
            this.time_point = Math.round(this.time_point) // 四捨五入
            this.time_point = this.time_point / 100 // 100 で除算
            this.time_point = this.time_point.toFixed(2)
            this.time_point = this.time_point * 100 // 100 で乗算
            this.time_point = Math.round(this.time_point) // 四捨五入
            this.time_point = this.time_point / 100 // 100 で除算
            this.time_point = this.time_point.toFixed(2)
            //最大値制限
            if(this.time_point <= 0){
                this.time_point = 0
            }else if(this.time_point >= 20.0){
                this.time_point = 20.0
            }
        },

        //秒数
        onSecond: function (e) {
            this.time_second = e.target.value
            this.base_point = Number(this.time_second) + Number(this.time_temp)
            this.culculate_time()
        },
        //ミリ秒数
        onMillisecond: function (e) {
            this.time_temp = e.target.value
            if(this.time_temp<10){
                this.time_temp = this.time_temp / 10 // 10 で除算
                this.time_temp = this.time_temp.toFixed(1)
            }else if(this.time_millisecond>=10){
                this.time_temp = this.time_temp / 100 // 100 で除算
                this.time_temp = this.time_temp.toFixed(2)
            }
            this.base_point = Number(this.time_second) + Number(this.time_temp)
            this.culculate_time()
        },
        getCurrentPacetime: function() {
            _self = this;
            $.ajax({
                type: 'get',
                url: "/currentresult/getPacetime",
                data: {},
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("getCurrentPacetime OK");
                    _self.time_paceset = result;
                    _self.$nextTick(function(){
                    //    setTimeout(function(){_self.getCurrentPacetime();}, 1000);
                    });
                },
                error: function(err) {
                    console.log("getCurrentPacetime NG "+ err.responseJSON.message);
                    _self.message = "情報の取得に失敗しました。";
                    _self.status = 'failed';
                    _self.$nextTick(function(){
                        //setTimeout(function(){_self.message = "";}, 3000);
                    });
                }
            });
        },    
        //現在の選択選手読み込み
        getCurrentRaceInfo: function() {
            /*common用のapp.blade.phpへ出力*/
            appcommon.getCurrentPacetime();
            appcommon.getCurrentRacer();
        },

        //再申請
        onReapply: function(e) {
            this.temp = e.target.value
            this.getCurrentPacetime();
        },
        //確定
        onConfirm: function(e) {
            this.temp = e.target.value
            console.log("onConfirm");
            //apiで登録（とりあえずカレントテーブルに登録→ターンジャッジテーブルに登録するのは後日）
            _self = this;
            $.ajax({
                type: 'post',
                url: "/currentresult/postcurrent",
                data: {
                    sec: _self.base_point,
                    time:_self.time_point,
                    paceset:_self.time_paceset,
                },
                dataType: 'json',
                success: function(result) {
                    if (typeof (result.error_code) !== 'undefined') {
                        console.log(result.error_code + ':' + result.massege);
                        return;
                    }
                    console.log("onConfirm OK");
                    _self.message = "ヘッドジャッジの画面に更新しました。";
                    _self.getCurrentPacetime();
                    _self.$nextTick(function(){
                        setTimeout(function(){
                            _self.message = "";
                            _self.getCurrentPacetime();
                        }, 3000);
                    });
                },
                error: function(err) {
                    console.log("onConfirm NG "+ err.responseJSON.message);
                    _self.message = "更新に失敗しました。"+err.responseJSON.message;
                }
            });    
        },
        //数字1
        onNum1: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "1"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字2
        onNum2: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "2"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字3
        onNum3: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "3"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字4
        onNum4: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "4"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字5
        onNum5: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "5"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字6
        onNum6: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "6"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字7
        onNum7: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "7"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字8
        onNum8: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "8"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字9
        onNum9: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "9"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //数字0
        onNum0: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.temp = this.temp + "0"
            this.base_point = Number(this.temp)
            //this.culculate_time()
        },
        //ピリオド
        onPeriod: function(e) {
            this.temp = e.target.value
            this.temp = this.base_point
            this.base_point = this.temp + "."
        },
        //クリア
        onClear: function(e) {
            this.temp = e.target.value
            this.base_point = ""
        },
        //数字モード
        onNumMode: function(e) {
            //this.temp = e.target.value
            this.base_point = this.temp
            this.culculate_time()
            this.time_second = Math.floor(this.base_point);
            this.temp = (this.base_point-Math.floor(this.base_point))*100;
            this.time_millisecond =  Math.floor(this.temp);
        },
    },
    mounted() {
        _self = this;
        console.log("mounted");
        this.$nextTick(function () {
            // ビュー全体がレンダリングされた後にのみ実行されるコード
            console.log("nextTick");
            appcommon.getCurrentRacer();
            appcommon.getCurrentPacetime();
        })
    },
}
)
  