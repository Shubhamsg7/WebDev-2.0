""" if-statement """

name = "Rob"

if name == "Rob" or name == "kirstan":
    print ("Hello " + name)
else:
    print ("I don't know you")


# create a program which display the first 50 prime numbers 2, 3, 5, 7......

numberOfPrimes = 0
number = 2

while numberOfPrimes < 50:
    isPrime = True    
    for i in range(2, number):
        if number % i == 0:
            isPrime = False
    
    if isPrime == True:
        print (number)
        numberOfPrimes += 1
    
        
    number += 1


