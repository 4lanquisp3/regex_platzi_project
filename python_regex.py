import re 

# compilar lo hace más rapido la busqueda de regex
pattern = re.compile(r'^([\d]{4,4})\-\d\d\-\d\d,(.+),(.+),(\d+),(\d+),.*$')

f = open("./results.csv","r")

for line in f:
  res = re.match(pattern, line)
  if res:
    total = int(res.group(4)) + int(res.group(5))
    if total > 10:
      print("Goles; %d, %s %s, %s [%d-%d]" % \
         (total, res.group(1), res.group(2), \
           res.group(3), int(res.group(4)), \
             int(res.group(5)))
         )
  
f.close()