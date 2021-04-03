#loops
for x in range(5, 11):
  print(x)

print ("rob")


favouriteFoods = ["Pizza", "Chocolate", "Ice Cream"]

for food in favouriteFoods:
    print ("I like eating" + food + ".")


x = 0 
while x <= 10:
    print (x)
    x += 1


""" dictionary - 4 names (key) and ages(value) of people
loop which prints. eg. Sum is 7 """

ages = {}
ages["Rob"] = 35
ages["Kirstan"] = 36
ages["Tommy"] = 5
ages["Ralphie"] = 3

for age in ages:
    print (age + " is " + str(ages[age]))