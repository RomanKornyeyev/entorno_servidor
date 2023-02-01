from django.db import models

# Create your models here.
class Usuarios(models.Model):
    GENERO_OPCIONES= (
        ('H', 'Hombre'),
        ('M', 'Mujer')
    )
    nombre = models.CharField(max_length=80)
    fecha_nacimiento = models.DateField(null=True, blank=True)
    genero = models.CharField(max_length=1, choices=GENERO_OPCIONES)

    def __str__(self):
        return self.nombre


class Planes(models.Model):
    TIPO_PLAN = (
        ('A', 'Caro'),
        ('B', 'Medio'),
        ('C', 'Barato')
    )
    nombre = models.CharField(max_length=50)
    usuarios = models.ForeignKey(Usuarios, on_delete=models.CASCADE)

    def __str__(self):
        return self.nombre