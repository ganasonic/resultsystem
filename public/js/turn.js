//Vue.config.devtools = true;
var app = new Vue(
  {
    el: '#turn',
    data: {
      message: '',
      carving_point: 8.0,
      absext_point: 6.0,
      upper_point: 6.0,
      base_point: 20.0,
      deduction: 0.0,
      turn_point: 20.0,
      in_point: 0,
      level_cv: '',
      level_ae: '',
      level_ub: '',
      temp: 0,
      scale: 1
    },
    methods: {
      culculate_turn: function() {
        this.base_point = Number(this.carving_point) + Number(this.absext_point) + Number(this.upper_point)
        this.base_point = this.base_point * 10 // 10 で乗算
        this.base_point = Math.round(this.base_point) // 四捨五入
        this.base_point = this.base_point / 10 // 10 で除算
        this.base_point = this.base_point.toFixed(1)

        this.turn_point = Number(this.base_point) - Number(this.deduction)
        this.turn_point = this.turn_point * 10 // 10 で乗算
        this.turn_point = Math.round(this.turn_point) // 四捨五入
        this.turn_point = this.turn_point / 10 // 10 で除算
        this.turn_point = this.turn_point.toFixed(1)

      },

      onBase: function (e) {
        this.base_point = e.target.value
        this.culculate_turn()
      },
      //カービングスライダ
      onCarving: function (e) {
        this.carving_point = e.target.value
        this.culculate_turn()
      },
      //アブソープション・エクステンションスライダ
      onAbsext: function (e) {
        this.absext_point = e.target.value
        this.culculate_turn()
      },
      //アッパーボディスライダ
      onUpper: function (e) {
        this.upper_point = e.target.value
        this.culculate_turn()
      },
      onDeduction: function (e) {
        this.deduction = e.target.value
        this.culculate_turn()
      },


      //ターンレベル文字
      loadLevelStringTurnBase: function(in_point) {
        retvalue = "";
        this.in_point = in_point;
        if(this.in_point>=0 && this.in_point<4.1){
            retvalue = "Poor"
        }else if(this.in_point>=4.1 && this.in_point<8.1){
            retvalue = "Below Average"
        }else if(this.in_point>=8.1 && this.in_point<12.1){
            retvalue = "Average"
        }else if(this.in_point>=12.1 && this.in_point<16.1){
            retvalue = "Good"
        }else if(this.in_point>=16.1){
            retvalue = "Excellent"
        }
        return retvalue;
      },

      //カービングレベル文字
      loadLevelStringC: function(in_point) {
        retvalue = "";
        this.in_point = in_point;
        if(this.in_point>=0 && this.in_point<1.7){
            retvalue = "Poor"
        }else if(this.in_point>=1.7 && this.in_point<3.3){
            retvalue = "Below Average"
        }else if(this.in_point>=3.3 && this.in_point<4.9){
            retvalue = "Average"
        }else if(this.in_point>=4.9 && this.in_point<6.5){
            retvalue = "Good"
        }else if(this.in_point>=6.5){
            retvalue = "Excellent"
        }
        return retvalue;
      },

      //吸収・伸展・上体レベル文字
      loadLevelStringAEU: function(in_point) {
        retvalue = "";
        this.in_point = in_point;
        if(this.in_point>=0 && this.in_point<1.3){
            retvalue = "Poor"
        }else if(this.in_point>=1.3 && this.in_point<2.5){
            retvalue = "Below Average"
        }else if(this.in_point>=2.5 && this.in_point<3.7){
            retvalue = "Average"
        }else if(this.in_point>=3.7 && this.in_point<4.9){
            retvalue = "Good"
        }else if(this.in_point>=4.9){
            retvalue = "Excellent"
        }
        return retvalue;
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
      },
      //確定
      onConfirm: function(e) {
        console.log("onConfirm");
        //apiで登録（とりあえずカレントテーブルに登録→ターンジャッジテーブルに登録するのは後日）
        _self = this;
        $.ajax({
            type: 'post',
            url: "/currentresult/postcurrent",
            data: {turnB: _self.base_point,turnD:_self.deduction},
            dataType: 'json',
            success: function(result) {
                if (typeof (result.error_code) !== 'undefined') {
                    console.log(result.error_code + ':' + result.massege);
                    return;
                }
                console.log("onConfirm OK");
                _self.message = "ヘッドジャッジの画面に更新しました。";
                _self.$nextTick(function(){
                  setTimeout(function(){
                      _self.message = "";
                      _self.getCurrentRaceInfo();
                  }, 3000);
              });
            },
            error: function(err) {
                console.log(err);
                _self.message = "更新に失敗しました。"+err.massege;
              }
        });
      },
      //数字1
      onNum1: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "1"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字2
      onNum2: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "2"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字3
      onNum3: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "3"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字4
      onNum4: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "4"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字5
      onNum5: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "5"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字6
      onNum6: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "6"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字7
      onNum7: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "7"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字8
      onNum8: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "8"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字9
      onNum9: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "9"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //数字0
      onNum0: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.temp = this.temp + "0"
        this.deduction = Number(this.temp)
        this.culculate_turn()
      },
      //ピリオド
      onPeriod: function(e) {
        this.temp = e.target.value
        this.temp = this.deduction
        this.deduction = this.temp + "."
      },
      //クリア
      onClear: function(e) {
        this.temp = e.target.value
        this.deduction = ""
      },
    },
    mounted() {
      _self = this;
      console.log("mounted");
      this.$nextTick(function () {
          // ビュー全体がレンダリングされた後にのみ実行されるコード
          console.log("nextTick");
            //_self.getCurrentResult();
            appcommon.getCurrentRacer();
      })
  },
}
)
  