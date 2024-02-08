// APLICACIÓN AULAS
// src/app/services/aula.service.ts

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Aula } from '../models/aula.model';

@Injectable({
  providedIn: 'root'
})
export class AulaService {

  private apiUrl = 'http://127.0.0.1:8000/aulas/consultarAulas';

  constructor(private http: HttpClient) { }

  getAulas(): Observable<Aula[]> {
    return this.http.get<Aula[]>(this.apiUrl);
  }
}