program lr3;

var
  y, x, truey, error, maxx, deltax, minx: real;
  i, n: integer;

begin
  write('������� ���������� �������� '); read(n);
  write('������� ��� (������ x)'); read(deltax);
  write('������� ��������� �������� x'); read(minx);
  write('������� �������� �������� x'); read(maxx);
  
  x := minx;
  
  while x <= maxx do 
  
  begin
    y := x;
    truey := exp(ln(x) / -3);
    writeln('x=', x);
    writeln('������ �������� ������� ��� x=', x, ': ', truey);
    
    for i:=1 to n do  
    
    begin
      y := (y - x * sqr(sqr(y))) / 3 + y;
      error := abs(truey - y);
      writeln(i);
      writeln('y=', y);
      writeln('�����������=', error);
    end;
 
    x := x + deltax;
  end;
end.