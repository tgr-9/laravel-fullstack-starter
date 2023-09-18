import { router } from '@inertiajs/core'
import type { Config } from 'ziggy-js'
import ziggyRoute from 'ziggy-js'

import { Ziggy } from '~/ziggy.cjs'

export type AppRoutes = typeof Ziggy.routes
export type RouteFunction = typeof ziggyRoute

export const install: AppModuleInstall = ({ app, isClient }): void => {
  if (!isClient)
    return

  window.__inertiaNavigatedCount = window.__inertiaNavigatedCount || 0

  router.on('navigate', () => {
    window.__inertiaNavigatedCount++
  })

  const route = (name: keyof AppRoutes, params?: any, absolute?: boolean) => {
    return ziggyRoute(name, params, absolute, Ziggy as Config)
  }

  app.config.globalProperties.$route = window.route = route as RouteFunction
}

declare global {
  const route: RouteFunction

  interface Window {
    __inertiaNavigatedCount: number
    route: RouteFunction
  }
}

declare module 'vue' {
  interface ComponentCustomProperties {
    $route: RouteFunction
  }
}

declare module 'ziggy-js' {
  export default function route(
    name: keyof AppRoutes,
    params?: RouteParamsWithQueryOverload | RouteParam,
    absolute?: boolean,
  ): string
}
