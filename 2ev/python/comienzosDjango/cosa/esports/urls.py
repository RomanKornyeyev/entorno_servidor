#import
from django.urls import path #hay que hacerlo si o si
from . import views #del modulo esports, importame views


#def
urlpatterns = [
    path('', views.index, name='esport_raiz')
]

