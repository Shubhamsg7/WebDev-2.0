#functions

def sayHello():
    print ("Hello!")

sayHello()

""" example 2 """
def saySomething():
    print ("Hi there!")

saySomething()

""" multiply two number """
def multiplyTwoNumbers(x,y):
    return x * y

print (multiplyTwoNumbers(4,6))

""" create a function highestCommonFactor which returns the highest number that divides into two other numbers exactly """

def highestCommonFactor(x, y):
    for i in range(1, x+ 1):
        if x % i == 0 and y % i == 0:
            hcf = i
    return hcf

print (highestCommonFactor(15, 10))


#add two numbers
a= 5
b= 6

def addTwoNumber():
    c = 8
    return a + b

print (addTwoNumber())
print (c) #not print c
