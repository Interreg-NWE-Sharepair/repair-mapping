import { ModalComponent } from '../../components/modal';

export interface ModalPluginConstructor {
  new (modalComponent?: ModalComponent, options?: {}): ModalPlugin;
}

export interface ModalPlugin {
  initElement(): void;
  afterCreateModal(): void;
  getTriggerClass(): string;
  openModalClick(trigger: HTMLElement): void;
  closeModal(): void;
  gotoNextAction(): void;
  gotoPrevAction(): void;
}
