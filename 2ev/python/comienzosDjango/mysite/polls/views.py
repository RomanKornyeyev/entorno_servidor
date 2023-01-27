from django.shortcuts import render
from django.http import HttpResponse


def index(request):
    return HttpResponse("Hello, world. You're at the polls index.")

def saludo(request):
    return HttpResponse("Hola Román")

def navegador(request):
    navegador = request.META["HTTP_USER_AGENT"].split(" ")[0]
    return HttpResponse(f"Tu navegador: {navegador}")
    # return HttpResponse(f"Tu navegador dice: {request.META['HTTP_USER_AGENT']}")