#import
from django.urls import path #hay que hacerlo si o si
from . import views #del modulo esports, importame views


#def
urlpatterns = [
    path('', views.index, name='noticias_raiz'),
    path('<str:nombre>/', views.detalle_noticia, name='noticias_detalle_noticia')
]

