"""CÁLCULO DEL ÍNDICE DE MASA CORPORAL (IMC)
¿Cuánto pesa? 78
¿Cuánto mide en metros? 1.73
Su imc es 26.1
Un ímc muy alto indica obesidad. Los valores normales de imc están entre 20 y 25,
pero esos límites dependen de la edad, del sexo, de la constitución física, etc."""

peso = float(input("Introduce tu peso"))
altura = float(input("Introduce tu altura"))
# imc = peso / pow(altura, 2)
imc = peso/altura**2

if imc >= 20 and imc <=25:
    print(f"Tu imc ({imc}) es normal")
elif imc > 25:
    print(f"Tu imc ({imc}) es alto, estás gordo")
else:
    print(f"Tu imc ({imc}) es bajo, estás flaco")