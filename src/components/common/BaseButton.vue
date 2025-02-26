<template>
  <button 
    class="base-button"
    :class="[variant]"
    @click="$emit('click')"
  >
    <slot></slot>
  </button>
</template>

<script>
export default {
  name: 'BaseButton',
  props: {
    variant: {
      type: String,
      default: 'primary',
      validator: value => ['primary', 'secondary', 'danger'].includes(value)
    }
  }
}
</script>

<style lang="scss" scoped>
.base-button {
  padding: 0.5rem 1rem;
  border-radius: 4px;
  border: none;
  cursor: pointer;
  font-family: var(--font-family-base);
  
  &.primary {
    background-color: var(--color-primary);
    color: var(--color-white);
  }
  
  &.secondary {
    background-color: var(--color-secondary);
    color: var(--color-white);
  }
  
  &.danger {
    background-color: var(--color-danger);
    color: var(--color-white);
  }

  &:hover {
    opacity: 0.9;
  }
}
</style> 