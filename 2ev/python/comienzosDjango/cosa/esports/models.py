from django.db import models

# Create your models here.
# class Equipo extends Model
class Equipo(models.Model):
    nombre = models.CharField(max_length=50)
    descripcion = models.TextField()
    anio = models.DateField()
    foto = models.ImageField(upload_to='equipos', null=True)

    def __str__(self):
        return f"{self.nombre} ({self.anio})"



class Genero(models.Model):
    nombre = models.CharField(max_length=50)
    descripcion = models.TextField()

    def __str__(self):
        return f"{self.nombre}"



class Juego(models.Model):
    nombre = models.CharField(max_length=50)
    descripcion = models.TextField()
    anio = models.DateField()
    genero = models.ForeignKey(Genero, on_delete=models.SET_NULL, null=True)
    equipos = models.ManyToManyField(Equipo, related_name='juegos')

    def __str__(self):
        return f"{self.nombre} [{self.genero}]({self.anio})"

