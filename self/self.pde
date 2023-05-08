PImage img_s,img_t,img_h,img_temp;
PImage img_back;
int tap = 0;
int y = 500;
int r = 25;
int pos_x = 500,pos_y = 300;
int chap_num;
int png_flag = 0;

String[][] text_a;
int Flag = 0;
int now_chap = 0;

void setup(){
  size(1600,900);
  background(255,255,255);
  img_s = loadImage("satomi.png");
  img_t = loadImage("takako.png");
  img_h = loadImage("hibito.png");
  image(img_h,200,400);
  image(img_t,500,400);
  image(img_s,780,400);
  String[]read = loadStrings("chapter.txt");
  text_a = new String[read.length][5];
  for(int i = 0;i < read.length;i++){
    text_a[i] = split(read[i],",");
    chap_num = i;
  }
  PFont font = createFont("MS Gothic",24);         //フォントの指定
  textFont(font);   
  fill(180,0,0);
  textSize(140);
  text("青春殺人事件",100,400);
  fill(100,0,0);
  textSize(90);
  text("～卒業のかおり～",250,850);
}

void draw(){
}

void mousePressed(){ //<>//
  switch (Flag){
    case 0:
      switch (png_flag){
        case 0:
          background(255,255,255);
          img_back = loadImage("school.jpg");
          image(img_back,0,0);
          Flag = 1;
          png_flag = 1;
          break;
        case 1:
          background(255,255,255);
          img_back = loadImage("class.jpg");
          image(img_back,0,0);
          blood(); //<>//
          fill(0,0,0);
          stroke(0,0,0);
          img_temp = loadImage("satoshi.png");
          image(img_temp,400,200);
          Flag = 1;
          png_flag = 3;
          break;
        case 2:
          background(255,255,255);
          image(img_h,300,400);
          image(img_t,500,400);
          image(img_s,700,400);
          text("犯人をクリックしよう",300,300);
          Flag = 2;
          break;
        case 3:
          background(255,255,255);
          image(img_back,0,0);
          Flag = 1;
          png_flag = 4;
          break;
        case 4:
          image(img_back,0,0);
          image(img_s,500,200);
          png_flag = 5;
          Flag = 1;
          break;
        case 5:
          image(img_back,0,0);
          image(img_s,500,200);
          png_flag = 6;
          Flag = 1;
          break;
        case 6:
          image(img_back,0,0);
          image(img_h,500,200);
          png_flag = 7;
          Flag = 1;
          break;
        case 7:
          image(img_back,0,0);
          image(img_h,500,200);
          png_flag = 8;
          Flag = 1;
          break;
        case 8:
          image(img_back,0,0);
          image(img_t,500,200);
          png_flag = 9;
          Flag = 1;
          break;
        case 9:
          image(img_back,0,0);
          image(img_t,500,200);
          Flag = 1;
          png_flag = 2;
          break;
      }
        
    case 1:
      if(now_chap <= chap_num){
        textSize(70);
        fill(0,0,0);
        text(text_a[now_chap][tap],50,y);
        y = y + 75;
        tap = tap + 1;
      }
      if(tap == 4){
        Flag = 0;
        tap = 0;
        y = 500;
        now_chap ++;
      }
      break;
    case 2:
      int x = mouseX;
      int y = mouseY;
      if(x > 300 && x < 900 && y > 400 && y < 800){
        if(x > 300 && x < 500){
          background(255,255,255);
          image(img_h,500,200);
          text("ああ、おれが殺したよ",200,200);
          Flag = 3;
        }
        if(x > 501 && x < 900){
          background(255,255,255);
          blood();
          textSize(70);
          fill(0,0,0);
          text("奴は犯人ではない",200,400);
          Flag = 3;
        }
      }
      break;
    case 3:
      background(255,255,255);
      text("END",400,600);
      break;
      
  } 
}


void blood(){                              //関数bloodを定義。血の演出を作る
  for(int i = 0;i < 550;i++){
    int ran = int (random(0,4));
    stroke(200,0,0);
    rectMode(CENTER);
    fill(200,0,0);
    switch(ran){
      case 0:
        pos_x = pos_x - r;
        rect(pos_x,pos_y,r,r);
        continue;
      case 1:
        pos_x = pos_x + r;
        rect(pos_x,pos_y,r,r);
        continue;
      case 2:
        pos_y = pos_y - r;
        rect(pos_x,pos_y,r,r);
        continue;
      case 3:
        pos_y = pos_y + r;
        rect(pos_x,pos_y,r,r);
        continue;
    }
  }
  pos_x = 500;
  pos_y = 300;
}
