program lr2;
{�������� ������ ����������}
  var n, arctg, z: real;
  
  begin 
  
  write('n='); read(n);
  
  arctg:=sqr(arctan(n));
  
  if arctg>1 then 
  
      begin
      z:=sqr(sin(n))*sqrt(2);
      writeln('����������� ������� arctg^2>1(1)') 
      end
      
  else if (arctg>=10E-5)and(arctg<=1) then 
  
      begin 
      z:=-0.068E-10;
      writeln('����������� ������� 10E-5<=arctg^2<=1(2)')
      end
    
  else z:=sin(arctg)/cos(arctg);
       writeln('����������� ������� arctg^2<10E-5(3)');
  
  writeln('Arctg = ',arctg, '; z = ',z);
  
  end.