void setup(){
  size(500,200);
  noStroke();
  colorMode(HSB,255);
  rectMode(CENTER);
}
void draw(){
  int x = 70;
  int y = 80;
  int step = 12;
  int stepWidth = 5;
  int rectSize = step * stepWidth;
  for(;x<width-rectSize*0.5;x+=rectSize+1){
    for(int m =step;m>=1;m--){
      if(x - rectSize * 0.5<= mouseX&&mouseX<= x+rectSize*0.5
      &&y-rectSize*0.5<=mouseY&&mouseY<=y+rectSize*0.5){
        fill((((m*(360/step)+frameCount*8)%360)/360.0)*255,240,240);
      }
      else
        fill(0,0,150);
      rect(x,y,m*stepWidth,m*stepWidth);
    }
  }
}
