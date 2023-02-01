#import
from django.urls import path #hay que hacerlo si o si
from . import views #del modulo esports, importame views


#def
urlpatterns = [
    path('', views.index, name='esport_raiz'),
    path('<str:nombre>/', views.detalle_equipo, name='esport_detalle_equipo'),
    path('juego/<str:nombre>/', views.detalle_juego, name='esport_detalle_juego'),
    path('genero/<str:nombre>/', views.detalle_genero, name='esport_detalle_genero')
]

