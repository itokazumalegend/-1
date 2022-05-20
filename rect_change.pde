//2021/9/11 伊藤和真　学籍番号21T309
//第八回課題
int leftX= -1;//初期値を-1に設定
int leftY= -1;//初期値を-1に設定
int rightX = -1;//初期値を-1に設定
int rightY = -1;//初期値を-1に設定

void setup(){
  size(640,480);//ウィンドウのサイズを決定
}
void draw(){
  if(mousePressed == true){//マウスが押されているかどうか
    if(mouseButton == LEFT){//左クリックの場合の処理
      leftX = mouseX;//座標を設定
      leftY = mouseY;//座標を設定
    }
    if(mouseButton == RIGHT){//右クリックの場合の処理
      rightX = mouseX;//座標を設定
      rightY = mouseY;//座標を設定
    }
    if(leftX != -1 && leftY != -1
    && rightX != -1&& rightY != -1){//論理積
      rect(leftX,leftY,rightX-leftX,rightY-leftY);//rect(X座標,Y座標,横,高さ)
    }
  }
}
