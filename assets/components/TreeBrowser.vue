<template>
    <draggable class="dragArea" tag="div" :list="nodes">
      <div
          v-for="node in nodes"
          :key="node.name"

          :style="{'margin-left': `${depth * 20}px`}"
          class="node"
      >
        <span class="type">&#9671;</span>
        <span>{{ node.name }}</span>
        <span v-if="node.qnt"class="qnt">{{node.qnt}} questoes</span>

        <TreeBrowser
            v-if="node.children"
            :nodes="node.children"
            :depth="depth + 1"
        />
      </div>
    </draggable>
</template>

<script>
import draggable from "vuedraggable";

export default {
  name: "TreeBrowser",
  props: {
    nodes: Array,
    depth: {
      type: Number,
      default: 0,
    },
  },
  data() {
    return {
      expanded: [],
    };
  },
  components: {
    draggable,
  },
};
</script>

<style scoped>

.node {
  text-align: left;
  font-size: 18px;
}

.type {
  margin-right: 10px;
}

</style>