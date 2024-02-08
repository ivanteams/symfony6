// APLICACIÓN AULAS
// src/app/components/aula-list/aula-list.component.ts

import { Component, OnInit } from '@angular/core';
import { AulaService } from '../../services/aula.service';
import { Aula } from '../../models/aula.model';

@Component({
  selector: 'app-aula-list',
  templateUrl: './aula-list.component.html',
  styleUrls: ['./aula-list.component.css']
})
export class AulaListComponent implements OnInit {

  aulas: Aula[] = [];

  constructor(private aulaService: AulaService) { }

  ngOnInit(): void {
    this.aulaService.getAulas().subscribe(data => {
      this.aulas = data;
    });
  }
}