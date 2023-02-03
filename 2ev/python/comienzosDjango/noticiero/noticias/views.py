from django.shortcuts import render
from django.http import HttpResponse
from django.template import loader
from .models import Noticia

# Create your views here.
def index(request):
    notis = Noticia.objects.all()
    context = {'notis': notis}
    return render(request, 'noticias/notis.html', context)

def detalle_noticia(request, nombre):
    vengoDelORMSoyUnaVariable = Noticia.objects.get(nombre=nombre)
    context = {'noticiaVarParaTemplate': vengoDelORMSoyUnaVariable }
    return render(request, 'noticias/noti.html', context)
