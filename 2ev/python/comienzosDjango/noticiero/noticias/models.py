from django.db import models

# Create your models here.
# class Noticia extends Model
class Noticia(models.Model):
    nombre = models.CharField(max_length=100)
    descripcion = models.TextField()
    fecha = models.DateField()
    foto1 = models.ImageField(upload_to='noti', null=True)
    foto2 = models.ImageField(upload_to='noti', null=True)
    foto3 = models.ImageField(upload_to='noti', null=True)
    foto4 = models.ImageField(upload_to='noti', null=True)
    foto5 = models.ImageField(upload_to='noti', null=True)

    def __str__(self):
        return f"{self.nombre} ({self.fecha})"