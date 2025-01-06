//Vue.config.devtools = true;
var app = new Vue(
  {
    el: '#dm',
    data: {
      message: '',
      base_point: 0,
      red_point: 5,
    },
    methods: {
      culculate_point: function() {
        this.base_point = Number(this.base_point);
        this.red_point = 5-Number(this.base_point);
        this.onConfirm();
      },

      //ターンレベル文字
      showInputPoint: function(in_point) {
        retvalue = in_point;
        this.base_point = in_point;
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
            url: "/currentdmresult/postcurrent",
            data: {point: this.base_point},
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
      //数字0
      onTapDm0: function(e) {
        this.base_point =0;
        this.culculate_point();
      },
      //数字1
      onTapDm1: function(e) {
        this.base_point =1;
        this.culculate_point();
      },
      //数字2
      onTapDm2: function(e) {
        this.base_point =2;
        this.culculate_point();
      },
      //数字3
      onTapDm3: function(e) {
        this.base_point =3;
        this.culculate_point();
      },
      //数字4
      onTapDm4: function(e) {
        this.base_point =4;
        this.culculate_point();
      },
      //数字5
      onTapDm5: function(e) {
        this.base_point =5;
        this.culculate_point();
      },
      //数字2.5
      onTapDm25: function(e) {
        this.base_point =2.5;
        this.culculate_point();
      },
    },
    mounted() {
    _self = this;
    console.log("mounted");
    console.log("nextTick");
    //_self.getCurrentResult();
    appcommon.getCurrentRacer();
    this.$nextTick(function () {
            // ビュー全体がレンダリングされた後にのみ実行されるコード
            //console.log("nextTick");
            //_self.getCurrentResult();
            //appcommon.getCurrentRacer();
        })
  },
}
)
  