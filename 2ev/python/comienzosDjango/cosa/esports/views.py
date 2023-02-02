from django.shortcuts import render
from django.http import HttpResponse
from .models import Equipo, Juego, Genero

# Create your views here.
def index(request):
    return HttpResponse('Hola Mundo')

def detalle_equipo(request, nombre):
    vengoDelORMSoyUnaVariable = Equipo.objects.get(nombre=nombre)
    context = {
        'equipoVarParaTemplate': vengoDelORMSoyUnaVariable,
        'publicidad': "IES Juan de la cierva. Tu instituto blablabla",
        'ultimasnoticias': ["Hola", "k", "ase?"]
    }
    return render(request, 'esports/equipo.html', context)

def detalle_juego(request, nombre):
    return HttpResponse(f"El nombre del juego es {nombre}")

def detalle_genero(request, nombre):
    return HttpResponse(f"El nombre del genero es {nombre}")