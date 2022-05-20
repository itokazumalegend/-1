int[]X = new int[50];
int[]Y = new int[50];
int i = 0;
void setup(){
  size(1000,1000);
}

void draw(){
}

void mousePressed(){
  if (i <50){    //左クリックが50回未満の場合の処理
   if (mouseButton == LEFT){
     X[49-i] = mouseX;
     Y[49-i] = mouseY;
     println(X[49-i]);
     println(Y[49-i]);
     println(i);
     i = i+1;
   }
  }
  if (i==50){    //50回以上左クリックをした場合の処理
    for(int k=49;k>0;k--){
      X[k] = X[k-1];
      Y[k] = Y[k-1];
    }
    X[0] = mouseX;
    Y[0] = mouseY;
    println(X[49]);
    println(Y[49]);
  }
  for(int n  = 0;n < 50;n++){
    print(X[n]+",");
  }
  println("区切り");
  for(int n  = 0;n < 50;n++){
    print(Y[n]+",");
  }
  println("区切り");
  if (mouseButton == RIGHT){
    if(i==50){
      for(int l = 0;l < 50;l++){
        ellipse(X[l],Y[l],10,10);
      }
    }
    if(i<50){
      for(int h = 0;h <= i;h++){
        ellipse(X[49-h],Y[49-h],10,10);
      }
    }
  }
}
