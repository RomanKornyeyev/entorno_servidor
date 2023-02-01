# Generated by Django 4.1.5 on 2023-02-01 15:37

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('polls', '0001_initial'),
    ]

    operations = [
        migrations.CreateModel(
            name='Ofertas',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('oferta', models.CharField(max_length=200)),
                ('salario', models.DecimalField(decimal_places=5, max_digits=10)),
                ('pub_date', models.DateTimeField(verbose_name='date published')),
            ],
        ),
    ]
