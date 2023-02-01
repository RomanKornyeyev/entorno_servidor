from django.shortcuts import render
from django.http import HttpResponse
from .models import Equipo, Juego, Genero

# Create your views here.
def index(request):
    return HttpResponse('Hola Mundo')

def detalle_equipo(request, nombre):
    e = Equipo.objects.get(nombre=nombre)
    juegos = ""
    for j in e.juego_set.all():
        juegos += j.nombre+"<br>"
    
    return HttpResponse(f"El nombre del equipo es {e.nombre}: {e.descripcion} <br> {juegos}")

def detalle_juego(request, nombre):
    return HttpResponse(f"El nombre del juego es {nombre}")

def detalle_genero(request, nombre):
    return HttpResponse(f"El nombre del genero es {nombre}")