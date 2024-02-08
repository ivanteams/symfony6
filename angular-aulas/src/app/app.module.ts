// APLICACIÓN AULAS
// src/app/app.module.ts

import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { AulaListComponent } from './components/aula-list/aula-list.component';
import { HttpClientModule } from '@angular/common/http';

@NgModule({
  declarations: [
    AppComponent,
    AulaListComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule,  // Asegúrate de que esto esté aquí
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
