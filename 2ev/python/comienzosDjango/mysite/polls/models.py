from django.db import models

"""
java/php
class Question extends Model{

}

python:
class Question(model):
    atributo1
    atributo2
"""


class Question(models.Model):
    question_text = models.CharField(max_length=200)
    pub_date = models.DateTimeField('date published')

    def __str__(self):
        return self.question_text


class Ofertas(models.Model):
    oferta = models.CharField(max_length=200)
    salario = models.DecimalField(decimal_places=5)
    pub_date = models.DateTime('date published')

    def __str__(self):
        return self.oferta



class Choice(models.Model):
    question = models.ForeignKey(Question, on_delete=models.CASCADE)
    choice_text = models.CharField(max_length=200)
    votes = models.IntegerField(default=0)

    def __str__(self):
        return self.choice_text