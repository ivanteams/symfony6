// APLICACIÓN AULAS
// src/app/models/aula.model.ts

export interface Aula {
    numAula: number;    // Primary Key
    capacidad: number;
    docente: string;
    hardware: boolean;
  }