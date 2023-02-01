from django.contrib import admin

# Register your models here.
from .models import Equipo, Juego, Genero

admin.site.register(Equipo)
admin.site.register(Juego)
admin.site.register(Genero)