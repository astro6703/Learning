program lr3;

var
  y, x, truey, error: real;
  i, n: integer;

begin
  write('������� x: '); read(x);
  write('������� ���������� �������� '); read(n);
  
  y := x;
  
  truey := exp(ln(x) / -3);                {���������� ������� �������� �������}
  writeln('������ �������� ������� ', truey);
  
  for i:=1 to n do  
  
  begin
    y := (y - x * sqr(sqr(y))) / 3 + y;   
    error := abs(truey - y);               {����������� ����������� ����������}
    writeln(i);
    writeln('y=', y);
    writeln('�����������=', error);
  end;
end.