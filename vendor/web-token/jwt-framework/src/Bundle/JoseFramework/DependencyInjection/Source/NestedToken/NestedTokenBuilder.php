<?php

declare(strict_types=1);

namespace Jose\Bundle\JoseFramework\DependencyInjection\Source\NestedToken;

use Jose\Bundle\JoseFramework\DependencyInjection\Source\Source;
use Jose\Bundle\JoseFramework\Services\NestedTokenBuilderFactory;
use Jose\Component\NestedToken\NestedTokenBuilder as NestedTokenBuilderService;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class NestedTokenBuilder implements Source
{
    public function name(): string
    {
        return 'builders';
    }

    public function load(array $configs, ContainerBuilder $container): void
    {
        foreach ($configs[$this->name()] as $name => $itemConfig) {
            $service_id = sprintf('jose.nested_token_builder.%s', $name);
            $definition = new Definition(NestedTokenBuilderService::class);
            $definition
                ->setFactory([new Reference(NestedTokenBuilderFactory::class), 'create'])
                ->setArguments([
                    $itemConfig['jwe_serializers'],
                    $itemConfig['key_encryption_algorithms'],
                    $itemConfig['content_encryption_algorithms'],
                    $itemConfig['compression_methods'],
                    $itemConfig['jws_serializers'],
                    $itemConfig['signature_algorithms'],
                ])
                ->addTag('jose.nested_token_builder')
                ->setPublic($itemConfig['is_public']);
            foreach ($itemConfig['tags'] as $id => $attributes) {
                $definition->addTag($id, $attributes);
            }
            $container->setDefinition($service_id, $definition);
            $container->registerAliasForArgument($service_id, self::class, $name . 'NestedTokenBuilder');
        }
    }

    public function getNodeDefinition(NodeDefinition $node): void
    {
        $node->children()
            ->arrayNode($this->name())
            ->treatNullLike([])
            ->treatFalseLike([])
            ->useAttributeAsKey('name')
            ->arrayPrototype()
            ->children()
            ->booleanNode('is_public')
            ->info('If true, the service will be public, else private.')
            ->defaultTrue()
            ->end()
            ->arrayNode('signature_algorithms')
            ->info('A list of signature algorithm aliases.')
            ->useAttributeAsKey('name')
            ->isRequired()
            ->scalarPrototype()
            ->end()
            ->end()
            ->arrayNode('key_encryption_algorithms')
            ->info('A list of key encryption algorithm aliases.')
            ->useAttributeAsKey('name')
            ->isRequired()
            ->scalarPrototype()
            ->end()
            ->end()
            ->arrayNode('content_encryption_algorithms')
            ->info('A list of key encryption algorithm aliases.')
            ->useAttributeAsKey('name')
            ->isRequired()
            ->scalarPrototype()
            ->end()
            ->end()
            ->arrayNode('compression_methods')
            ->info('A list of compression method aliases.')
            ->useAttributeAsKey('name')
            ->defaultValue(['DEF'])
            ->scalarPrototype()
            ->end()
            ->end()
            ->arrayNode('jws_serializers')
            ->info('A list of JWS serializer aliases.')
            ->useAttributeAsKey('name')
            ->treatNullLike([])
            ->treatFalseLike([])
            ->isRequired()
            ->requiresAtLeastOneElement()
            ->scalarPrototype()
            ->end()
            ->end()
            ->arrayNode('jwe_serializers')
            ->info('A list of JWE serializer aliases.')
            ->useAttributeAsKey('name')
            ->treatNullLike([])
            ->treatFalseLike([])
            ->isRequired()
            ->requiresAtLeastOneElement()
            ->scalarPrototype()
            ->end()
            ->end()
            ->arrayNode('tags')
            ->info('A list of tags to be associated to the service.')
            ->useAttributeAsKey('name')
            ->treatNullLike([])
            ->treatFalseLike([])
            ->variablePrototype()
            ->end()
            ->end()
            ->end()
            ->end()
            ->end();
    }

    public function prepend(ContainerBuilder $container, array $config): array
    {
        return [];
    }
}
